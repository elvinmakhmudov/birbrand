<template>
    <div id="buy-it-guest" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Indi al</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" v-on:submit.prevent="buy" role="form" method="POST" action="register" @keydown="errors.clear($event.target.name)">
                        <div class="form-group" v-bind:class="{'has-error': errors.get('name')}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" autofocus v-model="name">
                                <label class="control-label" v-if="errors.has('number')"  v-text="errors.get('name')"></label>
                            </div>
                        </div>

                        <div class="form-group" v-bind:class="{'has-error': errors.get('number')}">
                            <label for="number" class="col-md-4 control-label">Phone number</label>

                            <div class="col-md-6">
                                <input id="number" type="number" class="form-control" name="number" v-model="number">
                                <label class="control-label" v-if="errors.has('number')" v-text="errors.get('number')"></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" :disabled="errors.any()">
                                    Indi al
                                </button>
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
        props: {
            products: {},
        },
        data() {
            return {
                name: '',
                number: '',
                errors: new Errors()
            }
        },
        methods: {
            buy() {
                axios.post('order', {
                        products: this.products,
                        name: this.name,
                        number: this.number,
                }).then(function (response) {
                    this.$store.state.errors.record(response.data.errors);
                    this.$store.state.messages.record(response.data.messages);
                        this.$store.state.cartItems=[];
                    $('#buy-it-guest').modal('toggle');
                    $('#flash-message').modal('toggle');
                }.bind(this)).catch(error => {
                    this.errors.record(error.response.data);
                });
            }
        }
    }
</script>