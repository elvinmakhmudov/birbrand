<template>
    <div class="row">
        <div class="col s12 m8 offset-m2">
            <div class="layout">
                <div class="row">
                    <h5 class="col s12">{{ $t('login.title') }}</h5>
                    <form v-on:submit.prevent="login" role="form" method="POST"
                          action="login" @keydown="errors.clear($event.target.name)">
                        <div class="input-field col s12 m6">
                            <label class="active error" v-if="errors.has('number')"
                                   v-text="$t(errors.get('number'))"></label>
                            <input :placeholder="numberPlaceholder" id="number" type="text" name="number" class="validate"
                                   v-model="number">
                            <label for="number" class="active" v-show="!errors.has('number')">{{ $t('login.number')
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

                        <div class="col s12">
                            <button type="submit" class="btn btn-primary" :disabled="errors.any()">
                                {{ $t('login.loginButton') }}
                            </button>
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
                number: '',
                password: '',
                errors: new Errors(),
                numberPlaceholder: this.getRandom(['994552002020','994518888888','994707070707'])
            }
        },
        methods: {
            getRandom(array) {
                return array[Math.floor(Math.random()*array.length)];
            },
            login() {
                axios.post('/login', {
                    number: this.number,
                    password: this.password,
                }).then(function (response) {
                    this.$store.state.user = response.data;
                    window.location.href = "/";
                }.bind(this)).catch(error => {
                    this.errors.record(error.response.data);
                });
            }
        }
    }
</script>
