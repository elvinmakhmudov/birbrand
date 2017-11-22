<template>
    <div class="row">
        <div class="col s12 m8 offset-m2">
            <div class="layout">
                <div class="row">
                    <h5 class="col s12">{{ $t('signup.title') }}</h5>
                    <form v-on:submit.prevent="register" role="form" method="POST" action="register"
                          @keydown="errors.clear($event.target.name)">
                        <div class="input-field col s12 m6">
                            <label class="active error" v-if="errors.has('name')"
                                   v-text="errors.get('name')"></label>
                            <input placeholder="Elvin" id="name" type="text" name="name" class="validate"
                                   v-model="name">
                            <label for="name" class="active" v-show="!errors.has('name')">{{ $t('signup.name')
                                }}</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <label class="active error" v-if="errors.has('number')"
                                   v-text="errors.get('number')"></label>
                            <input placeholder="994518550105" id="number" type="text" name="number" class="validate"
                                   v-model="number">
                            <label for="number" class="active" v-show="!errors.has('number')">{{ $t('signup.number')
                                }}</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <label class="active error" v-if="errors.has('address')"
                                   v-text="errors.get('address')"></label>
                            <input placeholder="U.Akbarov 86T" id="address" type="text" name="address" class="validate"
                                   v-model="address">
                            <label for="address" class="active" v-show="!errors.has('address')">{{ $t('signup.address')
                                }}</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <label class="active error" v-if="errors.has('password')"
                                   v-text="errors.get('password')"></label>
                            <input placeholder="*****" id="password" type="password" class="validate"
                                   v-model="password" name="password">
                            <label for="password" class="active" v-show="!errors.has('password')">{{ $t('login.password')
                                }}</label>
                        </div>

                        <div class="form-group">
                            <div class="col s12">
                                <button type="submit" class="btn btn-primary" :disabled="errors.any()">
                                    {{ $t('signup.signUpButton') }}
                                </button>
                            </div>
                        </div>
                    </form>
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
