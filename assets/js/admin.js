new Vue({
	el:'#app',
	data:{
		dataArray:['初期値','２番目'],
		addItem:''
	},
	
	methods:{
		addList: function(){
			this.dataArray.push(this.addItem);
			this.addItem = '';
			return;
		},
		
		removeLast:function(){
			var lastIdx = this.dataArray.length - 1;
			this.dataArray.splice(lastIdx,1);
			return;
		}
	}
})
