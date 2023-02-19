new Vue({
	el:'#app',
	data:{
		dataArray:['']
	},
	
	methods:{
		addList: function(){
			this.dataArray.push(this);
		},
		
		removeLast:function(){
			var lastIdx = this.dataArray.length - 1;
			this.dataArray.splice(lastIdx,1);
			
		},
		removeOne:function(){
			var remOne = this.dataArray.item;
			this.dataArray.splice(remOne,1);
		}
	}
})
