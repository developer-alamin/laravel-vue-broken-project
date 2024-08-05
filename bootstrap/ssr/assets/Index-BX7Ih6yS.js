import { unref, withCtx, createTextVNode, createVNode, useSSRContext, resolveComponent } from "vue";
import { ssrRenderAttrs, ssrRenderComponent, ssrRenderList, ssrInterpolate, ssrRenderAttr } from "vue/server-renderer";
import { Link, Head } from "@inertiajs/vue3";
import { _ as _export_sfc } from "./_plugin-vue_export-helper-1tPrXgE0.js";
const _imports_0 = "/build/assets/avater-Dzg-xmFS.jpg";
const _sfc_main$1 = {
  __name: "IndexComponent",
  __ssrInlineRender: true,
  props: { customers: Object },
  setup(__props) {
    const props = __props;
    $(document).ready(function() {
      $("#Table").DataTable(
        {
          responsive: true,
          pageLenght: [5],
          lengthMenu: [5, 10, 25, 50, 100]
        }
      );
    });
    const getCustomers = () => {
      return props.customers;
    };
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<article${ssrRenderAttrs(_attrs)} data-v-77ae9651><div class="row" data-v-77ae9651><div class="col-12" data-v-77ae9651><div class="card" data-v-77ae9651><div class="card-header d-flex align-items-center" data-v-77ae9651><h4 data-v-77ae9651>All Customers List</h4>`);
      _push(ssrRenderComponent(unref(Link), {
        href: _ctx.route("customers.create"),
        class: "btn btn-outline-primary ms-auto"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`New Customer`);
          } else {
            return [
              createTextVNode("New Customer")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div><div class="card-body" data-v-77ae9651><table id="Table" class="table table-bordered table-hover table-striped" data-v-77ae9651><thead data-v-77ae9651><tr data-v-77ae9651><th data-v-77ae9651>Sr</th><th data-v-77ae9651>Name</th><th data-v-77ae9651>Email</th><th data-v-77ae9651>Customer Id</th><th data-v-77ae9651>Phone</th><th data-v-77ae9651>Village</th><th data-v-77ae9651>Photo</th><th data-v-77ae9651>Action</th></tr></thead><tbody data-v-77ae9651><!--[-->`);
      ssrRenderList(getCustomers(), (data, i) => {
        _push(`<tr data-v-77ae9651><td data-v-77ae9651>${ssrInterpolate(data.id)}</td><td data-v-77ae9651>${ssrInterpolate(data.name)}</td><td data-v-77ae9651>${ssrInterpolate(data.email)}</td><td data-v-77ae9651>${ssrInterpolate(data.customer_id)}</td><td data-v-77ae9651>${ssrInterpolate(data.phone)}</td><td data-v-77ae9651>${ssrInterpolate(data.village)}</td><td data-v-77ae9651>`);
        if (data.avatar) {
          _push(`<img${ssrRenderAttr("src", data.avatar)} alt="" data-v-77ae9651>`);
        } else {
          _push(`<img${ssrRenderAttr("src", _imports_0)} alt="" data-v-77ae9651>`);
        }
        _push(`</td><td class="text-center" data-v-77ae9651>`);
        _push(ssrRenderComponent(unref(Link), {
          href: _ctx.route("customers.edit", data.id),
          class: "btn btn-outline-success"
        }, {
          default: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(`<i class="fas fa-edit" data-v-77ae9651${_scopeId}></i>`);
            } else {
              return [
                createVNode("i", { class: "fas fa-edit" })
              ];
            }
          }),
          _: 2
        }, _parent));
        _push(ssrRenderComponent(unref(Link), { class: "btn btn-outline-primary" }, {
          default: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(`<i class="fas fa-eye" data-v-77ae9651${_scopeId}></i>`);
            } else {
              return [
                createVNode("i", { class: "fas fa-eye" })
              ];
            }
          }),
          _: 2
        }, _parent));
        _push(ssrRenderComponent(unref(Link), { class: "btn btn-outline-danger" }, {
          default: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(`<i class="fas fa-trash" data-v-77ae9651${_scopeId}></i>`);
            } else {
              return [
                createVNode("i", { class: "fas fa-trash" })
              ];
            }
          }),
          _: 2
        }, _parent));
        _push(`</td></tr>`);
      });
      _push(`<!--]--></tbody></table></div></div></div></div></article>`);
    };
  }
};
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Admin/Customes/IndexComponent.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const CustomerIndexComp = /* @__PURE__ */ _export_sfc(_sfc_main$1, [["__scopeId", "data-v-77ae9651"]]);
const _sfc_main = {
  __name: "Index",
  __ssrInlineRender: true,
  props: { customers: Object },
  setup(__props) {
    const props = __props;
    return (_ctx, _push, _parent, _attrs) => {
      const _component_AdminLayout = resolveComponent("AdminLayout");
      _push(`<!--[-->`);
      _push(ssrRenderComponent(unref(Head), { title: "Customer Index Page" }, null, _parent));
      _push(ssrRenderComponent(_component_AdminLayout, null, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(CustomerIndexComp, {
              customers: props.customers
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(CustomerIndexComp, {
                customers: props.customers
              }, null, 8, ["customers"])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`<!--]-->`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Admin/Customers/Index.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as default
};
