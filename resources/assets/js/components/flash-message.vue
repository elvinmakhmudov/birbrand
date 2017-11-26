<template>
    <div id="flash-message" class="modal" tabindex="-1">
        <div class="layout modal-content">
            <div class="row">
                <h5 class="col s12">Cavab</h5>
                <p class="text-info col s12" v-if="messages" v-for="message in messages" v-text="message"></p>
                <p class="text-info col s12" v-if="errors" v-for="error in errors" v-text="error"></p>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat">Bagla</a>
        </div>
    </div>
</template>

<script>
    export default {
        computed: {
            messages: function () {
                return this.$store.state.messages.all();
            },
            errors: function () {
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