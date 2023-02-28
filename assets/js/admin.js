
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


const draggable = window['vuedraggable'];
const App = {
    data() {
      return {
        items: [
        {no:1, name:'キャベツ', categoryNo:'1'},
        {no:2, name:'ステーキ', categoryNo:'2'},
        {no:3, name:'リンゴ', categoryNo:'3'}
        ]
      }
    },
    components: {
      draggable: draggable
    },
  }

  Vue.createApp(App).mount('drag');