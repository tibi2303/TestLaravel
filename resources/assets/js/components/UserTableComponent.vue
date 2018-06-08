
<template>
    <div class="root">
        <div class="filter-block">
            <input v-model="search" type="text" class="SearchInput" placeholder="placeholder">
            <select v-model="searchRole">
                <option value="">All</option>
                <option v-for="role in roles">{{ role }}</option>
            </select>
            <a href="#" @click="fetchUsers(pagination.firstPageUrl , search)" class="btn">Submit</a>
        </div>
        <div class="pagination-block">
            <a v-bind:class="[{disabled: !pagination.lastPageUrl}, 'btn btn-primary btn-sm']" href="#" @click="fetchUsers(pagination.lastPageUrl)">Previous</a>

            Page {{ pagination.currentPage }} of {{ pagination.lastPage }}

            <a v-bind:class="[{disabled: !pagination.nextPageUrl}, 'btn btn-primary btn-sm']" href="#" @click="fetchUsers(pagination.nextPageUrl)">Next</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Updated at</th>
                    <th>Created at</th>
                </tr>
            </thead>
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
                    {{user.role}}
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
                search: '',
                searchRole: '',
                roles: []
            }
        },
        created() {
            this.fetchUsers();
        },
        methods: {
            fetchUsers(pageUrl, search) {
                let vm = this;
                axios.get(pageUrl || 'api/users/search/', {params: {search: vm.search, role: vm.searchRole}})
                    .then((response) => {
                        vm.users = response.data.users;
                        vm.roles = response.data.roles;
                        vm.paginateUsers(response.data.users);
                    });
            },
            paginateUsers(configPagination) {
                this.pagination  = {
                    currentPage: configPagination.current_page,
                    nextPageUrl: configPagination.next_page_url,
                    lastPageUrl: configPagination.prev_page_url,
                    lastPage: configPagination.last_page,
                    firstPageUrl: configPagination.first_page_url
                };
            }
        }
    }

</script>