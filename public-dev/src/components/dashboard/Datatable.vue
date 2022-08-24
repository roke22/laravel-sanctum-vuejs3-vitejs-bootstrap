<script setup lang="ts">
import MenuLeft from './MenuLeft.vue';
import MenuTop from './MenuTop.vue'
import { onMounted, ref } from '@vue/runtime-core';
import TableLite from 'vue3-table-lite/ts'
import { useRouter } from 'vue-router';
import { apiGetData } from '../../plugins/api';

let offsetValue = 0
let limiteValue = 10
const router = useRouter()

const table = ref({
        isLoading: false,
        columns: [
          {
            label: "ID",
            field: "id",
            width: "3%",
            sortable: true,
            isKey: true,
          },
          {
            label: "Name",
            field: "name",
            width: "10%",
            sortable: true,
          },
          { 
            //This can be used for actions
            label: "",
            field: "actions",
            width: "10%",
            sortable: true,
          }
        ],
        rows: [],
        totalRecordCount: 0,
        sortable: {
          order: "id",
          sort: "asc",
        }
      })

const tableLoadingFinish = () => {
  table.value.isLoading = false;
}

const doSearch = (offset: any, limit: any, order: string, sort: string) => {
  offsetValue = offset
  limiteValue = limit
  table.value.isLoading = true;

  apiGetData(offset, limit, order, sort).then((response:any) => {
    table.value.rows = response.data.rows;
    table.value.totalRecordCount = response.data.count;
    table.value.sortable.order = order;
    table.value.sortable.sort = sort;
  })
};

doSearch(offsetValue, limiteValue, table.value.sortable.order, table.value.sortable.sort);
</script>
<template>
<div>
    <MenuLeft></MenuLeft>
    <MenuTop></MenuTop>
    <main class="content">
    
    <div class="row">
      <div class="col-12 mb-4">
        <div class="card border-2 shadow">
          <div class="card-header d-sm-flex flex-row align-items-center flex-0">
            <div class="display-4">Clientes</div>
            <div class="d-flex w-100 justify-content-end">
              <router-link to="/clients/new">
                <button class="btn btn-gray-50">
                  <font-awesome-icon icon="fa-solid fa-building" class="icon icon-xs fa-fw"/>
                  <font-awesome-icon icon="fa-solid fa-plus" class="icon-2xs"/>
                </button>
              </router-link>
            </div>
          </div>
          <div class="card-body">
              <TableLite
                :is-slot-mode="true"
                :is-loading="table.isLoading"
                :columns="table.columns"
                :rows="table.rows"
                :total="table.totalRecordCount"
                :sortable="table.sortable"
                @do-search="doSearch"
                @is-finished="tableLoadingFinish"
              >
                <template v-slot:actions="data">
                  <div class="d-flex w-100 justify-content-center">
                    <button class="btn btn-gray-50 ms-2" ><font-awesome-icon icon="fa-solid fa-pencil"/></button>
                  </div>
                </template>
              </TableLite>
          </div>
        </div>
      </div>
    </div>
  </main>
</div>
</template>
<style scoped>
@import '../../css/volt/volt.css';
</style>