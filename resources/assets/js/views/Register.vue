<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                        <form class="form-horizontal" v-on:submit.prevent="register" role="form" method="POST" action="register">
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" required autofocus v-model="name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="number" class="col-md-4 control-label">Phone number</label>

                                <div class="col-md-6">
                                    <input id="number" type="text" class="form-control" name="number" required v-model="number">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required v-model="password">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
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
    export default {
        data() {
            return {
                name: '',
                number: '',
                password: '',
            }
        },
        methods: {
            register(){
                axios.post('/register', {
                    name: this.number,
                    number: this.number,
                    password: this.password
                }).then(function(response) {
                    window.location.href = "/";
                    this.$emit('registered');
                    console.log("registered");
                }.bind(this)).
                catch(function(error) {
                    console.log(error)
                });
            }
        },
        created() {
            console.log('register vue created');
        }
    }
</script>
