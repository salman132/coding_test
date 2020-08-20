<template>
    <div class="history">

        <table class="table table-hover">
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

            }

        },
        created() {
            this.getHistories();

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
            }

        }

    }
</script>