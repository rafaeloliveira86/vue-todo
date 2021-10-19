<template>
    <div>
        <v-breadcrumbs :items="breadcrumbList" light>
            <template v-slot:divider>
                <v-icon>mdi-chevron-right</v-icon>
            </template>
        </v-breadcrumbs>
        <!-- <div class="breadcrumb">
            <ul>
                <li v-for="(breadcrumb, idx) in breadcrumbList" :key="idx" @click="routeTo(idx)" :class="{ 'linked': !!breadcrumb.link }">
                    {{ breadcrumb.name }}
                </li>
            </ul>
        </div> -->
    </div>
</template>

<script>
export default {
    name: "BreadcrumbComponent",
    data: () => ({
        breadcrumbList: []
    }),
    mounted() {
        this.updateList();
    },
    watch: {
        '$route' () {
            this.updateList();
        }
    },
    methods: {
        // routeTo(pRouteTo) {
        //     if (this.breadcrumbList[pRouteTo].link)
        //         this.$router.push(this.breadcrumbList[pRouteTo].link);
        // },
        updateList() {
            this.breadcrumbList = this.$route.meta.breadcrumb;
        }
    },
}
</script>

<style>
    .v-breadcrumbs {
        padding-left: 0 !important;
    }
</style>