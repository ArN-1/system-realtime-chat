
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('chat-log',require('./components/ChatLog.vue'));
Vue.component('chat-message',require('./components/ChatMessage.vue'));
Vue.component('chat-reply', require('./components/ChatReply.vue'));
const app = new Vue({
    el: '#app',
    data:{
    	messages:[],
      receives:[]
    },
    methods:{
    	AddMessage(message){
    		axios.post('/chats/messages',message).then(response => {
          this.messages.push(message);
        });
    	},
    },
    created(){
    	Echo.private('chat-room')
          .listen('MessagePush', (e) => {
                this.messages.push({
                  message: e.message.message,
                  name: e.user.name,
                  type:'receiver',
                  type_class:'message-main-receiver'
                });
            });

    }
});
