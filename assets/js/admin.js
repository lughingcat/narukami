new Vue({
	el:'#app',
	data(){
		return{
			subfooters:[{ text: '', url: ''}]
		}
	},
	
	
	methods:{
		add: function(){
			this.subfooters.push({ text: '', url:'' })
		},
		
		del: function(index){
			this.subfooters.splice(index,1);
		},
		delall : function(index){
			this.subfooters.splice(index);
		}
	}
})
