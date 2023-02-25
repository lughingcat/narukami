const draggable = window['vuedraggable'];

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



new Vue({
	el:'#dragtest',
	data:{
		items:[ 'ring','banana','frog']
	
  }
})