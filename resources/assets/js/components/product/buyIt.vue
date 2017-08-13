<template>
    <div id="buy-it" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Indi al</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" v-on:submit.prevent="register" role="form" method="POST"
                          action="register" @keydown="errors.clear($event.target.name)">
                        <div class="form-group" v-bind:class="{'has-error': errors.get('address')}">
                            <label for="address" class="col-md-4 control-label">Ünvan</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" autofocus
                                       v-model="address">
                                <label class="control-label" v-if="errors.has('address')"
                                       v-text="errors.get('address')"></label>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Dismiss</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Errors from '../../classes/Errors';

    export default {
        data() {
            return {
                name: '',
                number: '',
                errors: new Errors()
            }
        },
        computed: {
            'address': function () {
                return this.$store.state.user.address ? this.$store.state.user.address : '';
            }
        }

    }
</script>