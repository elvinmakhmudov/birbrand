import VueRouter from 'vue-router';

var routes = [
    {
        path: '/',
        component: require('./views/Home'),
        
    },
    {
        path: '/login',
        component: require('./views/Login')
    },
    {
        path: '/register',
        component: require('./views/Register')
    },
    {
        path: '/category/:slug',
        component: require('./views/Category')
    }
];
export default new VueRouter({
    routes
});
