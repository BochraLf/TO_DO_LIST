<template>
 
 <body class="h-screen bg-gradient-to-b from-white-100 to-pink-200">
    <div class="h-14 bg-gradient-to-r from-purple-300 to-pink-300">
     
 <div class="w-full xl:w-4/12 px-4 mx-auto mt-24">
    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white ">
      <div class="rounded-t mb-0 px-4 py-3 border-0">
        <div class="flex flex-wrap items-center">
          <div class="relative w-full px-4 max-w-full flex-grow flex-1">
            <h3 class="font-bold fond-candara text-XXXL text-blueGray-700 text-center">
              MY TO DO LIST !
            </h3>
          </div>
        
        </div>
      </div>
    </div>
</div>
<div class="block w-full overflow-x-auto">
        <table class="items-center w-full border-collapse text-blueGray-700  ">
          <thead class="thead-light ">
            <tr class ="w- full border border-slate-300" >
              <th class="px-1 bg-pink-200 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-s uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold ">
                Task Num
              </th>
              <th class="px-12 bg-pink-500 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-s uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold">
                Task Name
              </th>
              <th class="px-5 bg-purple-500 text-blueGray-700 align-middle border border-solid border-blueGray-100 py-3 text-s uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold min-w-140-px">
                Task Status
              </th>
              <th>
              <img src="https://cdn3.iconfinder.com/data/icons/google-material-design-icons/48/ic_info_outline_48px-512.png" width="40 " height="40">
              </th>
            </tr>
          </thead>
    
          <tbody>
            <tr  v-for="task in tasks"
             class ="w- full border border-slate-300" >
        
              <th class="border-t-0 font-semibold px-6 align-middle border-l-0 border-r-0 text-s whitespace-nowrap p-4 text-left">
                {{ task.id }}
              </th>
              <td class="border-t-0 font-semibold px-6 align-middle border-l-0 border-r-0 text-s whitespace-nowrap p-4 ">
                {{task.name}}
              </td>
              <td class="border-t-0 font-semibold px-6 align-middle border-l-0 border-r-0 text-s whitespace-nowrap p-4">
                <span class="px-2 py-1 font-semibold leading-tight text-purple-700 bg-purple-100 rounded-sm">  
                    {{ (task.done==1) ? "Done" :"Not done yet" }}
                </span>
              </td>
              <td>
                <button class="bg-cyan-500 hover:bg-blue-700 text-white text-s font-bold py-2 px-2 rounded-full">
                  <img src="https://icons.veryicon.com/png/o/miscellaneous/esgcc-basic-icon-library/modify-37.png" width="25" height="25">
                </button>
                <button class="bg-red-500 hover:bg-RED-900 text-white text-s font-bold py-2 px-2 rounded-full"
                  @click="deletetask(task.id)"
                > 
                <img src="https://cdn-icons-png.flaticon.com/512/1345/1345874.png" width="25" height="25">
                </button>
                
              </td>
              
            </tr>

        
        <tr 
        v-if="adding_new_tasks"
        class ="w- full border border-slate-500" >
        <th class="border-black align-middle text-XL text-left"></th>
        <td class="border-black lign-middle text-XL  text-left">
            <input type="text" name ="new_name" v-model="new_name" placeholder="task_name" class="border border black " />
        </td>
        <td class="border-black lign-middle text-XL p-4 text-left">
            <input type="text" name="new_done" v-model="new_done" placeholder="done_or_no?" class="border border black " />
        </td>
        </tr>
        </tbody>
    </table>
</div>

            <button class="bg-indigo-500 hover:bg-indigo-700 text-white text-s font-bold py-2 px-2 rounded-full text-S font-bold uppercase mr-1 mb-1 ease-linear transition-all duration-150 " 
            type="button"
            @click="adding_new_tasks=true ;">
            + Add new task
            </button>

            <button class="bg-pink-500 hover:bg-pink-700 text-white text-s font-bold py-2 px-2 rounded-full text-S font-bold uppercase mr-1 mb-1 ease-linear transition-all duration-150" 
            type="button"
            v-if="adding_new_tasks"
            @click="confirm_task">
            Confirm
            </button>

          </div>
</body>
</template>

<script>
import axios from 'axios';

    export default {
        data(){
            return {
                tasks : [],
                adding_new_tasks : false,
                new_name:'',
            } 
        },

        mounted(){
            axios.get('/api/get_task').then((response) => {
                this.tasks=response.data;
            });
        },
        methods : {
            confirm_task(){
                let data ={
                    "task.name" : this.new_name,
                };

                axios.post("/api/add_task",{new_name:this.new_name}).then((response) => {

            });
                alert('Adding Task!');
            },

            deletetask(taskid){
              
              if(confirm('are you sure?')){
                axios.delete('http://localhost:8000/api/delete', $taskid)
                .then((response)=> {
                  alert(response.data.message);
                  TaskController:get_task();
                })
                
              }
            
            }
                 } 
    } ;
</script>