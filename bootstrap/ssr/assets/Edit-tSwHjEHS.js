import { ref, unref, useSSRContext, resolveComponent, withCtx, createVNode } from "vue";
import { ssrRenderAttrs, ssrInterpolate, ssrRenderAttr, ssrIncludeBooleanAttr, ssrLooseContain, ssrRenderComponent } from "vue/server-renderer";
import { useForm, Head } from "@inertiajs/vue3";
const _sfc_main$1 = {
  __name: "EditComponent",
  __ssrInlineRender: true,
  props: { customer: Object },
  setup(__props) {
    const props = __props;
    ref("<strong>Processing...</strong>");
    $(document).ready(function() {
      $("#Table").DataTable(
        {
          responsive: true,
          pageLenght: [5],
          lengthMenu: [5, 10, 25, 50, 100]
        }
      );
    });
    const getCustomer = () => {
      return props.customer;
    };
    const form = useForm({
      id: getCustomer().id,
      name: getCustomer().name,
      customer_id: getCustomer().customer_id,
      phone: getCustomer().phone,
      email: getCustomer().email,
      village: getCustomer().village,
      national: getCustomer().national,
      father: getCustomer().father,
      mother: getCustomer().mother,
      mobile: "",
      mail: "",
      img: getCustomer().avatar
    });
    const editPreImg = ref("");
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<article${ssrRenderAttrs(_attrs)}><p>${ssrInterpolate(unref(form).img)}</p><div class="row"><div class="col-12"><div class="card"><div class="card-header d-flex align-items-center"><h4>New Customers</h4>`);
      if (editPreImg.value) {
        _push(`<img class="customerimg ms-auto"${ssrRenderAttr("src", editPreImg.value)}>`);
      } else {
        _push(`<img class="customerimg ms-auto"${ssrRenderAttr("src", unref(form).img)}>`);
      }
      _push(`</div><div class="card-body"><form><div class="row"><div class="col-12 col-sm-12 col-md-6 col-lg-4"><label for="img">Photo:</label><input type="file" name="img" accept="image/*" id="img" class="form-control"></div><div class="col-12 col-sm-12 col-md-6 col-lg-4"><label for="name">Name:</label><input${ssrRenderAttr("value", unref(form).name)} type="text" name="name" id="name" class="form-control"></div><div class="col-12 col-sm-12 col-md-6 col-lg-4"><label for="customer_id">Customer Id:</label><input${ssrRenderAttr("value", unref(form).customer_id)} type="text" name="customer_id" id="customer_id" class="form-control"></div><div class="col-12 col-sm-12 col-md-6 col-lg-4"><label for="phone">Phone:</label><input${ssrRenderAttr("value", unref(form).phone)} type="text" name="phone" id="phone" class="form-control"></div><div class="col-12 col-sm-12 col-md-6 col-lg-4"><label for="email">Email:</label><input${ssrRenderAttr("value", unref(form).email)} type="email" name="email" id="email" class="form-control"></div><div class="col-12 col-sm-12 col-md-6 col-lg-4"><label for="village">Village:</label><input${ssrRenderAttr("value", unref(form).village)} type="text" name="village" id="village" class="form-control"></div><div class="col-12 col-sm-12 col-md-6 col-lg-4"><label for="national">National Number:</label><input${ssrRenderAttr("value", unref(form).national)} type="text" name="national" id="national" class="form-control"></div><div class="col-12 col-sm-12 col-md-6 col-lg-4"><label for="father">Father:</label><input${ssrRenderAttr("value", unref(form).father)} type="text" name="father" id="father" class="form-control"></div><div class="col-12 col-sm-12 col-md-6 col-lg-4"><label for="mother">Mother:</label><input${ssrRenderAttr("value", unref(form).mother)} type="text" name="mother" id="mother" class="form-control"></div><div class="col-12 col-sm-12 col-md-6 col-lg-4 mt-4"><input${ssrIncludeBooleanAttr(Array.isArray(unref(form).mobile) ? ssrLooseContain(unref(form).mobile, null) : unref(form).mobile) ? " checked" : ""} type="checkbox" name="mobile" id="mobile"><label for="mobile" class="ms-1"> Are You Mobile Send SMS: </label></div><div class="col-12 col-sm-12 col-md-6 col-lg-4 mt-4"><input${ssrIncludeBooleanAttr(Array.isArray(unref(form).mail) ? ssrLooseContain(unref(form).mail, null) : unref(form).mail) ? " checked" : ""} type="checkbox" name="mail" id="mail"><label for="mail" class="ms-1"> Are You Email Send SMS: </label></div><div class="col-12 mt-3"><button type="submit" class="btn btn-outline-primary form-control updateBtn">Update</button></div></div></form></div></div></div></div></article>`);
    };
  }
};
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Admin/Customes/EditComponent.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const _sfc_main = {
  __name: "Edit",
  __ssrInlineRender: true,
  props: { customer: Object },
  setup(__props) {
    const props = __props;
    return (_ctx, _push, _parent, _attrs) => {
      const _component_AdminLayout = resolveComponent("AdminLayout");
      _push(`<!--[-->`);
      _push(ssrRenderComponent(unref(Head), { title: "Customer Edit Page" }, null, _parent));
      _push(ssrRenderComponent(_component_AdminLayout, null, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_sfc_main$1, {
              customer: props.customer
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_sfc_main$1, {
                customer: props.customer
              }, null, 8, ["customer"])
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
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Admin/Customers/Edit.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as default
};
