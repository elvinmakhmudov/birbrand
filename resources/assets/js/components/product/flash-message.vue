<template>
    <div id="flash-message" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"> Cavab </h4>
                </div>
                <div class="modal-body">
                        <!--<p class="text-danger" v-for="error in errors" v-text="error[1]"></p>-->
                        <p class="text-danger" v-if="errors.has('price')" :v-text="errors.get('price')"></p>
                        <p class="text-danger" v-if="errors.has('amount')" :v-text="errors.get('amount')"></p>
                        <p class="text-info" v-for="message in messages" v-text="message"></p>
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
        props: {
            errors: {},
            messages: {}
        },
        created() {
            console.log(this.errors);
        }
    }
</script>