<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
                        <form class="form-horizontal" v-on:submit.prevent="login" role="form" method="POST"
                              action="login" @keydown="errors.clear($event.target.name)">

                            <div class="form-group" v-bind:class="{'has-error': errors.get('number')}">
                                <label for="number" class="col-md-4 control-label">Phone number</label>

                                <div class="col-md-6">
                                    <input id="number" type="number" class="form-control" name="number" v-model="number" autofocus>
                                    <label class="control-label" v-if="errors.has('number')" v-text="errors.get('number')"></label>
                                </div>

                            </div>

                            <div class="form-group" v-bind:class="{'has-error': errors.get('password')}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" v-model="password">
                                    <label class="control-label" v-if="errors.has('password')"  v-text="errors.get('password')"></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" :disabled="errors.any()">
                                        Login
                                    </button>

                                    <a class="btn btn-link" href="">
                                        Forgot Your Password?
                                    </a>
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
                number: '',
                password: '',
                errors: new Errors()
            }
        },
        methods: {
            login(){
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
        },
        created() {
            console.log('login vue created');
        }
    }
</script>
