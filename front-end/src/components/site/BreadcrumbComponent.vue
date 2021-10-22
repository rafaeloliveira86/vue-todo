<template>
    <div>
        <v-container fluid><!-- class="wiki-breadcrumb-background"> -->
            <div class="wiki-breadcrumb-container">
                <v-breadcrumbs :items="breadcrumbList" light>
                    <template v-slot:divider>
                        <v-icon>mdi-chevron-right</v-icon>
                    </template>
                    <template v-slot:item="{ item }">
                        <v-breadcrumbs-item :href="item.href" :disabled="item.disabled">
                            <!-- {{ item.text.toUpperCase() }} -->
                            {{ item.text }}
                        </v-breadcrumbs-item>
                    </template>
                </v-breadcrumbs>
            </div>
        </v-container>
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
        updateList() {
            this.breadcrumbList = this.$route.meta.breadcrumb;
        }
    },
}
</script>

<style>
    .wiki-breadcrumb-container {
        width: 900px;
        min-width: 61.6%;
        height: auto;
        margin: 0 auto;
        padding: 0;
    }

    .wiki-breadcrumb-background {
        background: #eceef1 !important;
    }

    .v-breadcrumbs {
        padding-left: 0 !important;
    }

    @media only screen and (max-width: 992px) {
        .wiki-breadcrumb-container {
            width: 100%;
            padding: 0 15px;
        }
    }
</style>