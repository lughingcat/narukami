
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
		},
		
		dragList(event, dragIndex){
        event.dataTransfer.effectAllowed = 'move'
        event.dataTransfer.dropEffect = 'move'
        event.dataTransfer.setData('drag-index',dragIndex)
      },
      dropList(event, dropIndex){
        const dragIndex = event.dataTransfer.getData('drag-index')
        const deleteList = this.subfooters.splice(dragIndex, 1);
        this.subfooters.splice(dropIndex, 0, deleteList[0])
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