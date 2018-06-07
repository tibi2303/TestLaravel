
<template>
    <div class="root">

        <input v-model="search" type="text" class="SearchInput" placeholder="placeholder">
        <a href="#" @click="searchUsers(search)" class="btn">Submit</a>
        <a v-bind:class="[{disabled: !pagination.lastPageUrl}, 'page-link']" href="#" @click="fetchUsers(pagination.lastPageUrl)">Previous</a>

        Page {{ pagination.currentPage }} of {{ pagination.lastPage }}

        <a v-bind:class="[{disabled: !pagination.nextPageUrl}, 'page-link']" href="#" @click="fetchUsers(pagination.nextPageUrl)">Next</a>

        <table>
            <tr v-for="user in users.data">
                <td>
                    {{user.id}}
                </td>
                <td>
                    {{user.name}}
                </td>
                <td>
                    {{user.email}}
                </td>
                <td>
                    {{user.updated_at}}
                </td>
                <td>
                    {{user.created_at}}
                </td>
            </tr>
        </table>
    </div>
</template>
<script>

    import axios from 'axios';

    export default {
        data() {
            return {
                users: [],
                pagination: {},
                search: ''
            }
        },
        created() {
            this.fetchUsers();
        },
        methods: {
            fetchUsers(pageUrl) {
                let vm = this;
                axios.get(pageUrl || 'api/users')
                    .then(function (response) {
                        vm.users = response.data;
                        vm.paginateUsers(response.data);
                    });
            },
            paginateUsers(config) {
                this.pagination  = {
                    currentPage: config.current_page,
                    nextPageUrl: config.next_page_url,
                    lastPageUrl: config.prev_page_url,
                    lastPage: config.last_page,
                };
            },
            searchUsers() {
                let vm = this;
                axios.get('api/users/search/',{params: {query: vm.search}})
                    .then(function (response) {
                        vm.users = response.data;
                        vm.paginateUsers(response.data);
                    });
            }
        }
    }

</script>