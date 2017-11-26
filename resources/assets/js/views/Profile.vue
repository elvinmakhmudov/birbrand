<template>
    <div class="layout">
        <div class="row">
            <h5 class="col s12">{{ $t('profile.title') }} </h5>
            <h6 class="col s12">{{ $t('profile.general') }} </h6>
            <form class="form-horizontal" v-on:submit.prevent="update" role="form" method="POST"
                  action="register" @keydown="form1.errors.clear($event.target.name)">
                <div class="form-group" v-bind:class="{'has-error': form1.errors.get('name')}">
                    <div class="input-field col s12 m6">
                        <label class="active error" v-if="form1.errors.has('name')"
                               v-text="form1.errors.get('name')"></label>
                        <input id="name" placeholder=" " type="text" name="name" class="validate"
                               v-model="$store.state.user.name">
                        <label for="name" class="active" v-show="!form1.errors.has('name')">{{ $t('profile.name')
                            }}</label>
                    </div>
                </div>

                <div class="form-group" v-bind:class="{'has-error': form1.errors.get('number')}">
                    <div class="input-field col s12 m6">
                        <label class="active error" v-if="form1.errors.has('number')"
                               v-text="form1.errors.get('number')"></label>
                        <input id="number" type="text" placeholder=" " name="number" class="validate"
                               v-model="$store.state.user.number">
                        <label for="number" class="active" v-show="!form1.errors.has('number')">{{ $t('profile.number')
                            }}</label>
                    </div>
                </div>

                <div class="form-group" v-bind:class="{'has-error': form1.errors.get('address')}">
                    <div class="input-field col s12 m6">
                        <label class="active error" v-if="form1.errors.has('address')"
                               v-text="form1.errors.get('address')"></label>
                        <input id="address" type="text" placeholder=" " name="address" class="validate"
                               v-model="$store.state.user.address">
                        <label for="address" class="active"
                               v-show="!form1.errors.has('address')">{{ $t('profile.address')
                            }}</label>
                    </div>
                </div>

                <div class="form-group" v-bind:class="{'has-error': form1.errors.get('password')}">
                    <div class="input-field col s12 m6">
                        <label class="active error" v-if="form1.errors.has('password')"
                               v-text="form1.errors.get('password')"></label>
                        <input placeholder="*****" id="password" type="password" class="validate"
                               v-model="form1.password" name="password">
                        <label for="password" class="active"
                               v-show="!form1.errors.has('password')">{{ $t('profile.password')
                            }}</label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col s12">
                        <button type="submit" class="btn btn-primary" :disabled="form1.errors.any()">
                            {{ $t('profile.saveButton') }}
                        </button>
                    </div>
                </div>
            </form>
            <div class="col s12">
                <br>
                <h6>{{ $t('profile.changePassword') }}</h6>
            </div>
            <form class="form-horizontal" v-on:submit.prevent="updatePassword" role="form" method="POST"
                  action="register" @keydown="form2.errors.clear($event.target.name)">
                <div class="form-group" v-bind:class="{'has-error': form2.errors.get('password')}">
                    <div class="input-field col s12 m6">
                        <label class="active error" v-if="form2.errors.has('password')"
                               v-text="form2.errors.get('password')"></label>
                        <input placeholder="*****" id="password" type="password" class="validate"
                               v-model="form2.password" name="password">
                        <label for="password" class="active"
                               v-show="!form2.errors.has('password')">{{ $t('profile.password')
                            }}</label>
                    </div>
                </div>
                <div class="form-group" v-bind:class="{'has-error': form2.errors.get('new_password')}">
                    <div class="input-field col s12 m6">
                        <label class="active error" v-if="form2.errors.has('new_password')"
                               v-text="form2.errors.get('new_password')"></label>
                        <input placeholder="*****" id="new_password" type="password" class="validate"
                               v-model="form2.new_password" name="password">
                        <label for="new_password" class="active"
                               v-show="!form2.errors.has('new_password')">{{ $t('profile.passwordNew')
                            }}</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col s12">
                        <button type="submit" class="btn btn-primary" :disabled="form2.errors.any()">
                            {{ $t('profile.changePasswordButton') }}
                        </button>
                    </div>
                </div>
            </form>
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
                    prevNumber: '',
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
                axios.put('user/' + this.$store.state.user.id, {
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
