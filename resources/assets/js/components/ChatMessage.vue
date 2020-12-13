<template>
		<div class="row message-body" @dblclick="openAction" :class="{'on-block':onBlock}">
		    <div class="col-sm-10" v-bind:class="message.type_class">
		      <div v-bind:class="message.type">
		        <div class="message-text">
		         {{ message.message }}
		        </div>
		        <span class="message-time pull-right">
		          {{ message.name }}
		        </span>
						<a href="#" @click="DeleteMessage"><span class="fa fa-2x fa-trash text-danger" :class="{'hidden': isHidden}"></span></a>
		      </div>
		    </div>
		</div>
</template>
<script>
	import contextMenu from 'vue-context-menu';
	export default{
		props:['message'],
		components:{contextMenu},
		data(){
			return {
				isHidden:true,
				onBlock:false
			}
		},
		methods:{
			openAction(){
				this.isHidden = !this.isHidden;
				this.onBlock = !this.onBlock;
			},
			DeleteMessage(){
				if(confirm('Hapus pesan ?')){
					console.log('delete');
				}else{
					console.log('no')
				}
			}
		}
	}
</script>
