<template>
    <div>
        <ul class="pager">
            <li class="previous" v-if="hasPrevious">
                <a v-link="{ name: routeName, params: routeParams, query: { page: pagination.current_page - 1 } }">
                    <span aria-hidden="true">&larr;</span> Older
                </a>
            </li>
            <li class="next" v-if="hasNext">
                <a v-link="{ name: routeName, params: routeParams, query: { page: pagination.current_page + 1 } }">
                    Newer <span aria-hidden="true">&rarr;</span></a>
                </li>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props: {
        routeName: {
            type    : String,
            required: true,
        },
        pagination: {
            type    : Object,
            required: true,
        },
        routeParams: {
            type    : String,
            required: false,
            default : () => {}
        }
    },

    computed: {
        hasNext() {
            return this.pagination.current_page < this.pagination.total_pages;
        },

        hasPrevious() {
            return this.pagination.current_page - 1 > 0;
        }
    },
}
</script>
