<template>
    <!-- Modal trigger button -->
    <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modalId">
        Launch
    </button>

    <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
        aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Modal title
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Body</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>aasdfasdf

</template>

<script>
    export default {
        data() {
            return {
                'data': [

                ]
            }
        },
       
        created() {
            this.loadData()
        },
        mounted() {
        },
        methods: {
            async loadData() {
                let res = await fetch('pages.json')
                let data = await res.json()
                console.log(data)

                this.data = data
            }
        }
    }
</script>
