<template>
    <div class="content">
        <div class="layout">
            <div class="row">
                <div class="col-md-12">
                    <h2>Mənim səhifəm</h2>
                </div>
                <div class="col-md-12">
                    <h3>Ümumi</h3>
                </div>
                <form class="form-horizontal" v-on:submit.prevent="update" role="form" method="POST"
                      action="register" @keydown="form1.errors.clear($event.target.name)">
                    <div class="form-group" v-bind:class="{'has-error': form1.errors.get('name')}">
                        <label for="name" class="col-md-4 control-label">Ad</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" autofocus
                                   v-model="$store.state.user.name">
                            <label class="control-label" v-if="form1.errors.has('number')"
                                   v-text="form1.errors.get('name')"></label>
                        </div>
                    </div>

                    <div class="form-group" v-bind:class="{'has-error': form1.errors.get('number')}">
                        <label for="number" class="col-md-4 control-label">Nömrə</label>

                        <div class="col-md-6">
                            <input id="number" type="number" class="form-control" name="number"
                                   v-model="$store.state.user.number">
                            <label class="control-label" v-if="form1.errors.has('number')"
                                   v-text="form1.errors.get('number')"></label>
                        </div>
                    </div>

                    <div class="form-group" v-bind:class="{'has-error': form1.errors.get('address')}">
                        <label for="address" class="col-md-4 control-label">Ünvan (əlavə)</label>

                        <div class="col-md-6">
                            <input id="address" type="text" class="form-control" name="address"
                                   v-model="$store.state.user.address">
                            <label class="control-label" v-if="form1.errors.has('address')"
                                   v-text="form1.errors.get('address')"></label>
                        </div>
                    </div>

                    <div class="form-group" v-bind:class="{'has-error': form1.errors.get('password')}">
                        <label for="password" class="col-md-4 control-label">Şifrə</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password"
                                   v-model="form1.password">
                            <label class="control-label" v-if="form1.errors.has('password')"
                                   v-text="form1.errors.get('password')"></label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary" :disabled="form1.errors.any()">
                                Yadda saxla
                            </button>
                        </div>
                    </div>
                </form>
                <div class="col-md-12">
                    <h3>Şifrəni dəyişmək</h3>
                </div>
                <form class="form-horizontal" v-on:submit.prevent="updatePassword" role="form" method="POST"
                      action="register" @keydown="form2.errors.clear($event.target.name)">
                    <div class="form-group" v-bind:class="{'has-error': form2.errors.get('password')}">
                        <label for="password" class="col-md-4 control-label">Köhnə Şifrə</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password"
                                   v-model="form2.password">
                            <label class="control-label" v-if="form2.errors.has('password')"
                                   v-text="form2.errors.get('password')"></label>
                        </div>
                    </div>
                    <div class="form-group" v-bind:class="{'has-error': form2.errors.get('new_password')}">
                        <label for="new_password" class="col-md-4 control-label">Yeni Şifrə</label>

                        <div class="col-md-6">
                            <input id="password_confirmation" type="password" class="form-control" name="new_password"
                                   v-model="form2.new_password">
                            <label class="control-label" v-if="form2.errors.has('new_password')"
                                   v-text="form2.errors.get('new_password')"></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary" :disabled="form2.errors.any()">
                                Şifrəni dəyiş
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import Errors from '../classes/Errors';

    export default {
        data() {
            return {
                form1: {
                    password: '',
                    prevNumber : '',
                    errors: new Errors()
                },
                form2: {
                    password: '',
                    new_password: '',
                    errors: new Errors()
                },
            }
        },
        computed: {
            name: function () {
                return this.$store.state.user.name;
            },
            number: function () {
                return this.$store.state.user.number;
            },
            address: function () {
                return this.$store.state.user.address;
            },
        },
        watch: {
            // call again the method if the route changes
        },
        methods: {
            update() {
                axios.put('user/'+this.$store.state.user.id, {
                    name: this.name,
                    number: this.number,
                    address: this.address,
                    password: this.form1.password
                }).then(function (response) {
                    this.$store.state.errors.record(response.data.errors);
                    this.$store.state.messages.record(response.data.messages);
                    $('#flash-message').modal('toggle');
                    console.log(response.data);
                }.bind(this)).catch(error => {
                    this.form1.errors.record(error.response.data);
                });
                console.log('Products fetched');
            },
            updatePassword() {
                axios.put('user/password', {
                    password: this.form2.password,
                    new_password: this.form2.new_password
                }).then(function (response) {
                    this.$store.state.errors.record(response.data.errors);
                    this.$store.state.messages.record(response.data.messages);
                    $('#flash-message').modal('toggle');
                    console.log(response.data);
                }.bind(this)).catch(error => {
                    this.form2.errors.record(error.response.data);
                });
                console.log('Products fetched');
            }
        }
    }
</script>
