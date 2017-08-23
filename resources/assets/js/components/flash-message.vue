<template>
    <div id="flash-message" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"> Cavab </h4>
                </div>
                <div class="modal-body">
                        <p class="text-info" v-for="message in messages" v-text="message"></p>
                        <p class="text-info" v-for="error in errors" v-text="error"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Dismiss</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        computed: {
            messages: function() {
                return this.$store.state.messages.all();
            },
            errors: function() {
                return this.$store.state.errors.all();
            }
        },
        mounted() {
            $('#flash-message').on('hidden.bs.modal', function () {
                this.$store.state.errors.purge();
                this.$store.state.messages.purge();
            }.bind(this))
        }
    };
</script>