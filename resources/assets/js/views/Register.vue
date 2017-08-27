<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Qeydiyyat</div>
                    <div class="panel-body">
                        <form class="form-horizontal" v-on:submit.prevent="register" role="form" method="POST"
                              action="register" @keydown="errors.clear($event.target.name)">
                            <div class="form-group" v-bind:class="{'has-error': errors.get('name')}">
                                <label for="name" class="col-md-4 control-label">Ad</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" autofocus
                                           v-model="name">
                                    <label class="control-label" v-if="errors.has('number')"
                                           v-text="errors.get('name')"></label>
                                </div>
                            </div>

                            <div class="form-group" v-bind:class="{'has-error': errors.get('number')}">
                                <label for="number" class="col-md-4 control-label">Nömrə</label>

                                <div class="col-md-6">
                                    <input id="number" type="number" class="form-control" name="number"
                                           v-model="number">
                                    <label class="control-label" v-if="errors.has('number')"
                                           v-text="errors.get('number')"></label>
                                </div>
                            </div>

                            <div class="form-group" v-bind:class="{'has-error': errors.get('address')}">
                                <label for="address" class="col-md-4 control-label">Ünvan (əlavə)</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="address"
                                           v-model="address">
                                    <label class="control-label" v-if="errors.has('address')"
                                           v-text="errors.get('address')"></label>
                                </div>
                            </div>

                            <div class="form-group" v-bind:class="{'has-error': errors.get('password')}">
                                <label for="password" class="col-md-4 control-label">Şifrə</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password"
                                           v-model="password">
                                    <label class="control-label" v-if="errors.has('number')"
                                           v-text="errors.get('password')"></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" :disabled="errors.any()">
                                        Qeyd et
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Errors from '../classes/Errors';

    export default {
        data() {
            return {
                name: '',
                number: '',
                password: '',
                address: '',
                errors: new Errors()
            }
        },
        methods: {
            register() {
                axios.post('/register', {
                    name: this.number,
                    number: this.number,
                    address: this.address,
                    password: this.password
                }).then(function (response) {
                    window.location.href = "/";
                    this.$emit('registered');
                    console.log("registered");
                }.bind(this)).catch(error => {
                    this.errors.record(error.response.data);
                });
            }
        },
        mounted() {
            console.log('register vue created');
        }
    }
</script>
