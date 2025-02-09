<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Header -->
            <form method="GET" class="mb-6 flex flex-col md:flex-row gap-4 sm:px-5 px-4">
                <div class="flex-1 w-full md:w-5/6">
                    <input type="text" id="search" name="title" value="{{ request('title') }}" placeholder="Cari judul..." class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <select id="status-filter" name="status" class="px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent w-full md:w-1/6">
                    <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>Semua Status</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }}>Closed</option>
                </select>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">
                    Filter
                </button>
            </form>

            <!-- Forum List -->
            <div class="space-y-4 sm:px-5 px-4">
                <div class="w-full flex justify-end">
                    <button id="addForumBtn" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors">
                        Tambah Forum
                    </button>
                </div>
                @foreach ($themes as $tema)
                    <div class="bg-gray-100 rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow {{ $tema?->linkUser?->role === 'owner' ? 'bg-yellow-100' : '' }}">
                        <div class="flex items-start justify-between mb-2">
                            <h3 class="text-xl font-semibold text-gray-900">{{ $tema->title }} ({{ $tema?->linkUser?->name ?? '-' }})</h3>
                            <div class="flex items-center gap-3">
                                <span class="px-3 py-1 rounded-full text-sm font-medium 
                                    {{ $tema->status === 'active' ? 'bg-green-100 text-green-800' : '' }}
                                    {{ $tema->status === 'inactive' ? 'bg-gray-100 text-gray-800' : '' }}
                                    {{ $tema->status === 'closed' ? 'bg-red-100 text-red-800' : '' }}">
                                    {{ $tema->status === 'inactive' ? 'Menunggu Persetujuan' : $tema->status }}
                                </span>
                                @if (auth()->user()->role === 'owner')
                                    <button class="edit-forum-btn" data-data='{{ $tema }}'>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 hover:text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                @endif
                            </div>
                        </div>
                        <p class="text-gray-600 mt-2">{{ $tema->description }}</p>
                        <div class="flex justify-between items-center mt-4">
                            <div class="items-center gap-3">
                                <div class="text-sm text-gray-500">
                                    Interaction: {{ $tema->link_forum_count }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    Created: {{ $tema->created_at->toFormattedDateString() }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    @php
                                        $date = $tema?->linkForum[0]?->created_at ?? null;
                                        if (!$date) {
                                            $lastInteraction = '-';
                                        } else {
                                            $date = new \DateTime($date);
                                            $now = new \DateTime();

                                            // Format waktu HH:mm
                                            $timeStr = $date->format('H:i');

                                            // Jika hari ini
                                            if ($date->format('Y-m-d') === $now->format('Y-m-d')) {
                                                $lastInteraction = $timeStr;
                                            } else {
                                                // Jika kemarin
                                                $yesterday = new \DateTime('yesterday');
                                                if ($date->format('Y-m-d') === $yesterday->format('Y-m-d')) {
                                                    $lastInteraction = "Kemarin, {$timeStr}";
                                                } else {
                                                    // Hitung selisih hari
                                                    $interval = $now->diff($date);
                                                    $diffDays = $interval->days;

                                                    // Jika dalam 7 hari terakhir
                                                    if ($diffDays < 7) {
                                                        $hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                                                        $dayOfWeek = (int) $date->format('w');
                                                        $lastInteraction = "{$hari[$dayOfWeek]}, {$timeStr}";
                                                    } else {
                                                        // Jika lebih dari 7 hari
                                                        $bulan = [
                                                            '01' => 'Januari',
                                                            '02' => 'Februari',
                                                            '03' => 'Maret',
                                                            '04' => 'April',
                                                            '05' => 'Mei',
                                                            '06' => 'Juni',
                                                            '07' => 'Juli',
                                                            '08' => 'Agustus',
                                                            '09' => 'September',
                                                            '10' => 'Oktober',
                                                            '11' => 'November',
                                                            '12' => 'Desember',
                                                        ];

                                                        $day = $date->format('d');
                                                        $month = $bulan[$date->format('m')];
                                                        $year = $date->format('Y');

                                                        $lastInteraction = "{$day} {$month} {$year}, {$timeStr}";
                                                    }
                                                }
                                            }
                                        }
                                    @endphp
                                    Last Interaction: {{ $lastInteraction ?? null }}
                                </div>
                            </div>

                            @if ($tema->status === 'active')
                                <a href="/forum-chat/{{ $tema->id }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">
                                    Lihat Forum
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
                <!-- Pagination -->
                <div class="mt-4">
                    {{ $themes->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div id="forumModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center">
        <div class="bg-white rounded-lg p-8 max-w-md w-full mx-4">
            <h2 class="text-2xl font-bold mb-6 title-form">Add Theme</h2>
            <form id="forumForm" action="{{ route('forum.store') }}" method="POST">
                @csrf
                <input type="text" id="id" name="id" class="hidden">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
                        <input type="text" id="title" name="title" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                        <textarea name="description" id="description" rows="4" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                    </div>
                    @if (auth()->user()->role === 'owner')
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>

                        <select id="status" name="status" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="closed">Closed</option>
                        </select>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Locked</label>
                        <select id="locked" name="locked" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="yes">yes</option>
                            <option value="no">no</option>
                        </select>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Important</label>
                        <select id="important" name="important" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="1">yes</option>
                            <option value="0">no</option>
                        </select>
                    @endif
                    <div class="flex justify-end gap-3 mt-6">
                        <button type="button" class="cancel-btn px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors">
                            Batal
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    @push('js')
        <script type="module">
            $(document).ready(function() {
                // Filter functionality
                // Add Modal
                $('#addForumBtn').click(function() {
                    $('#forumModal').removeClass('hidden').addClass('flex');
                    $('.title-form').text('Add Theme');
                });

                // Edit Modal
                $('.edit-forum-btn').click(function() {
                    let data = $(this).data('data');
                    $('#forumModal').removeClass('hidden').addClass('flex');

                    $.each(data, function(i, v) {
                        $('#' + i).val(v);
                    });

                    $('.title-form').text('Edit Theme');
                });

                // Close Modals
                $('.cancel-btn').click(function() {
                    $('#forumModal, #editModal').removeClass('flex').addClass('hidden');
                    $('#forumForm, #editForm')[0].reset();
                });

                // Add Form Submit
            });
        </script>
    @endpush
</x-app-layout>
