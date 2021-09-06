<template>
    <div class="">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th @click="sortName" >Name</th>
                <th @click="sortPriority">priority</th>
                <th @click="sortTime">timestamps</th>
                <th>action</th>
            </tr>
            </thead>
            <tbody>

            <tr v-for="task in tasks">
                <td></td>
                <td>{{ task.name }}</td>
                <td>{{ task.priority }}</td>
                <td>{{ task.time }}</td>
                <td>
                    <div class="row">
                        <a class="btn-delete blue mt-auto ml-1 mr-1"
                           :href="'/tasks/'+task.id + '/edit'">
                            <i class="fa fa-edit" data-toggle="tooltip" title="edit"></i>
                        </a>
                        |
                        <button @click="deleteItem(task.id)" class="btn-delete deleteRecord">
                            <i class="fa fa-trash red" data-toggle="tooltip" title="delete"></i>
                        </button>
                    </div>
                </td>
            </tr>

            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            tasks: [],
            asc:false,
            desc:true
        }
    },
    mounted() {
        this.getAll();
    },
    methods: {
        getAll() {
            axios.get('/get-all-task')
                .then(res => {
                    var data = res.data.tasks
                    this.tasks = data.data
                })
        },
        deleteItem(id) {
            Swal.fire({
                title: 'alert!',
                text: "Are your sure delete this Task?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.value) {
                    var token = $("meta[name='csrf-token']").attr("content");
                    $.ajax(
                        {
                            url: "/tasks/" + id ,
                            type: 'DELETE',
                            data: {
                                "id": id,
                                "_token": token,
                            },
                            success: function (result) {
                                var delayInMilliseconds = 1000; //1 second
                                Swal.fire(
                                    'delete!',
                                    'Task is deleted',
                                    'success'
                                )
                                setTimeout(function() {

                                    window.location.replace('/tasks');
                                }, delayInMilliseconds);

                            }
                        });


                }
                else{
                    Swal.fire(
                        'delete!',
                        'You abort deleted',
                        'error'
                    )
                }
            });
        }
        ,
        sortName(){
            if (this.desc){
                axios.get('/task-sort-byNameDesc')
                    .then(res => {
                        var data = res.data.tasks
                        this.tasks = data.data
                    })
                this.desc = false;
                this.asc = true;
            }else
            {
                axios.get('/task-sort-byNameAsc')
                    .then(res => {
                        var data = res.data.tasks
                        this.tasks = data.data
                    })
                this.desc = true;
                this.asc = false;
            }

        }
        ,
        sortTime(){
            if (this.desc){
                axios.get('/task-sort-byPriorityDesc')
                    .then(res => {
                        var data = res.data.tasks
                        this.tasks = data.data
                    })
                this.desc = false;
                this.asc = true;
            }else
            {
                axios.get('/task-sort-byPriorityAsc')
                    .then(res => {
                        var data = res.data.tasks
                        this.tasks = data.data
                    })
                this.desc = true;
                this.asc = false;
            }

        }
        ,
        sortPriority(){
            if (this.desc){
                axios.get('/task-sort-byTimeDesc')
                    .then(res => {
                        var data = res.data.tasks
                        this.tasks = data.data
                    })
                this.desc = false;
                this.asc = true;
            }else
            {
                axios.get('/task-sort-byTimeAsc')
                    .then(res => {
                        var data = res.data.tasks
                        this.tasks = data.data
                    })
                this.desc = true;
                this.asc = false;
            }
        }
    }
}
</script>
