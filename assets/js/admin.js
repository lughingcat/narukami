
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


var main = new Vue({
  el: '#drag',
  data: {
    items: [{
      text: 'list1'
    }, {
      text: 'list2'
    }, {
      text: 'list3'
    }, {
      text: 'list4'
    }, {
      text: 'list5'
    }, ]
  }
});