<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
                        <form class="form-horizontal" v-on:submit.prevent="submitIt" role="form" method="POST"
                              action="login">

                            <div class="form-group">
                                <label for="number" class="col-md-4 control-label">Phone number</label>

                                <div class="col-md-6">
                                    <input id="number" type="text" class="form-control" name="number" v-model="number" required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" v-model="password" required>
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
                                    <button type="submit" class="btn btn-primary">
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
    export default {
        data() {
            return {
                number: '',
                password: '',
            }
        },
        methods: {
            submitIt(){
                axios.post('/login', {
                    number: this.number,
                    password: this.password
                }).then(function(response) {
//                    window.location.href = "#/";
                    this.$emit('logged');
                    console.log("emitted");
                }.bind(this)).
                catch(function(error) {
                    console.log(error)
                });
                console.log('submitted');
            }
        },
        created() {
            console.log('login vue created');
        }
    }
</script>
