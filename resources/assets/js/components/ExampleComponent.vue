<template>
    <div class="history">

        <form>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" name="group_name" @keyup="nameBy($event)" v-model="group_name" class="form-control" placeholder="Group Name">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" name="date" v-model="date" @focusout="byDate($event)" class="form-control datepicker" id="datetimepicker" placeholder="Date">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <select name="group_type"  class="form-control"  @change="getGroupBy($event)">
                        <option value="0">All Group</option>
                        <option v-for="(group , index) in groups" :value="group.id"   :key="index">{{ group.name }}</option>

                    </select>
                </div>


            </div>
        </form>

        <table class="table table-hover" style="padding-top: 20px">
            <thead>
            <tr>
                <th>Group Name</th>
                <th>Group Type</th>
                <th>Account Type</th>
                <th>Post Text</th>
                <th>Time</th>
            </tr>
            </thead>

            <tbody>
                <tr v-for="history in histories">
                    <td> {{ history.group_info.name }}</td>
                    <td> {{ history.group_info.type }}</td>
                    <td> {{ history.account_service }}</td>
                    <td> {{ history.post_text }}</td>
                    <td> {{ history.created_at }}</td>

                </tr>
            </tbody>



        </table>
        <nav aria-label="...">
            <ul class="pagination">
                <li class="page-item" v-bind:class="[{'disabled': !pagination.prev_page}]">

                    <a href="#" @click="getHistories(pagination.prev_page)">Previous</a>
                </li>
                <li class="page-item" >
                    <a href="@" class="page-link disabled">{{ pagination.current_page}} of {{ pagination.last_page }}</a>
                </li>
                <li class="page-item" v-bind:class="[{'disabled': !pagination.next_page}]">

                    <a href="#" @click="getHistories(pagination.next_page)">Next</a>
                </li>
            </ul>
        </nav>


    </div>
</template>


<script>
    export default {
        data(){
            return{
                histories: [],
                history_id: '',
                pagination: {},
                groups:[],
                group_name: '',
                date: '',
                group_id : '',


            }

        },
        created() {
            this.getHistories();
            this.getGroups();

        },
        methods:{
            getHistories:function (url) {

                url = url || 'api/history';
                axios.get(url).then(response =>{
                    this.histories = response.data.data;

                    let v = this;
                    v.makePagination(response.data);

                }).catch(error =>{
                    console.log(error)
                })
            },
            makePagination: function (data) {
                let pagination ={
                    current_page : data.current_page,
                    last_page: data.last_page,
                    next_page: data.next_page_url,
                    prev_page: data.prev_page_url
                };
                this.pagination = pagination;
            },
            getGroups:function () {
                axios.get('api/all_group').then(response =>{
                    this.groups = response.data;

                }).catch(error =>{
                    console.log(error)
                });
            },
            getGroupBy:function (event) {
                let val = event.target.value;
                  axios.get('api/group_by/'+val).then(response =>{
                      this.histories = response.data.data;
                      let v = this;
                      v.makePagination(response.data);
                  }).catch(error =>{
                      console.log(error)
                  })
            },

            nameBy:function (event) {
                let val = event.target.value;

                axios.get('api/group_name/'+val).then(response =>{
                    this.histories = response.data.data;
                    let v = this;
                    v.makePagination(response.data);
                }).catch(error =>{
                    console.log(error)
                })
            },
            byDate:function (event) {
                let val = event.target.value;

                axios.get('api/by_date/?date='+val).then(response =>{
                    this.histories = response.data.data;
                    let v = this;
                    v.makePagination(response.data);
                }).catch(error =>{
                    console.log(error)
                })

            }

        }

    }
</script>