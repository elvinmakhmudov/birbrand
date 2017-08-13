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
                                Yadda saxla
                            </button>
                        </div>
                    </div>
                </form>
                <div class="col-md-12">
                    <h3>Şifrəni dəyişmək</h3>
                </div>
                <form class="form-horizontal" v-on:submit.prevent="update" role="form" method="POST"
                      action="register" @keydown="errors.clear($event.target.name)">
                    <div class="form-group" v-bind:class="{'has-error': errors.get('password')}">
                        <label for="password" class="col-md-4 control-label">Köhnə Şifrə</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password"
                                   v-model="password">
                            <label class="control-label" v-if="errors.has('number')"
                                   v-text="errors.get('password')"></label>
                        </div>
                    </div>
                    <div class="form-group" v-bind:class="{'has-error': errors.get('password')}">
                        <label for="password" class="col-md-4 control-label">Yeni Şifrə</label>

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
//                name: '',
//                number: '',
                password: '',
//                address: '',
                errors: new Errors()
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
            '$route': 'fetchData'
        },
        created() {
            this.fetchData();
        },
        methods: {
            update() {
                axios.post('user').then(function (response) {
                    }.bind(this)
                )
                console.log('Products fetched');
            }
        }
    }
</script>
