<template>
	<div class="row message" id="conversation">
  <div class="row message-previous">
    <div class="col-sm-12 previous">
      <a onclick="previous(this)" name="20">
      Show Previous Message!
      </a>
    </div>
  </div>

  <chat-message v-for="message in messages" :message="message"></chat-message>

</div>
</template>
<script>
    export default {
      props: ['messages','param'],
			mounted(){
				var self  = this;
				axios.get('/chats/p='+self.param+'/messages').then(response => {
					// self.messages = response.data;
					_.forEach(response.data,function(output){
						self.messages.push(output);
					});
				});
			}
    }
</script>
