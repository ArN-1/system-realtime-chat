<template>
	<div class="row reply">
	  <div class="col-sm-1 col-xs-1 reply-emojis">
	    <i class="fa fa-smile-o fa-2x"></i>
	  </div>
	  <div class="col-sm-9 col-xs-9 reply-main">
	    <textarea class="form-control" rows="1" id="comment" v-model="messageText"></textarea>
	  </div>
	  <div class="col-sm-1 col-xs-1 reply-recording">
	    <i class="fa fa-microphone fa-2x" aria-hidden="true"></i>
	  </div>
	  <div class="col-sm-1 col-xs-1 reply-send">
	    <i class="fa fa-send fa-2x" aria-hidden="true" @click="ReplyMessage"></i>
	  </div>
	</div>
</template>
<script>
    export default {
				props:['param','sender'],
        data(){
            return {
                messageText:''
            }
        },
        methods:{
        	ReplyMessage(){
						var self = this;
        		this.$emit('messagesent',{
        			message:this.messageText,
        			receiver: self.param,
							name: self.sender,
							type: 'sender',
							type_class:'message-main-sender'
        		});
        		this.messageText='';
        	}
        }
    }
</script>
