<template>
    <div class="root">
        <div class="filter-block">
            <input v-model="search" type="text" class="SearchInput" placeholder="Search">
            <select v-model="searchRole">
                <option value="">All</option>
                <option v-for="(role, index) in roles" :key="index">{{ role }}</option>
            </select>
            <a href="#" @click="fetchUsers(pagination.firstPageUrl , search)" class="search-btn">
                <svg>
                    <use xlink:href="svg/svg-sprite.svg#search"></use>
                </svg>
            </a>
        </div>
        <div class="table-responsive">
            <table class="table custom-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Updated at</th>
                    <th>Created at</th>
                </tr>
                </thead>
                <tr v-for="(user, index) in users.data" :key="index">
                    <td>
                        <router-link :to="{ name: 'ViewUser', params: { userId: user.id }}">{{user.id}}</router-link>
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

        <div class="pagination-block">
            <a v-bind:class="[{disabled: !pagination.lastPageUrl}, 'btn btn-main']" href="#" @click="fetchUsers(pagination.lastPageUrl)">Previous</a>

            <p>Page {{ pagination.currentPage }} of {{ pagination.lastPage }}</p>

            <a v-bind:class="[{disabled: !pagination.nextPageUrl}, 'btn btn-main']" href="#" @click="fetchUsers(pagination.nextPageUrl)">Next</a>
        </div>

    </div>
</template>
<script>

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