import { ref, unref, useSSRContext, resolveComponent, withCtx, createVNode } from "vue";
import { ssrRenderAttrs, ssrRenderAttr, ssrInterpolate, ssrIncludeBooleanAttr, ssrLooseContain, ssrRenderComponent } from "vue/server-renderer";
import { usePage, useForm, Head } from "@inertiajs/vue3";
const _imports_0 = "/build/assets/pjs-BSuaKG3a.png";
const _sfc_main$1 = {
  __name: "CreateComponent",
  __ssrInlineRender: true,
  props: { errors: Object },
  setup(__props) {
    const page = usePage();
    ref("<strong>Processing...</strong>");
    const form = useForm({
      file: "",
      name: null,
      customer_id: "",
      phone: "",
      email: "",
      village: "",
      nationals: "",
      father: "",
      mother: "",
      password: "",
      mobile: "",
      mail: ""
    });
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<article${ssrRenderAttrs(_attrs)}><div class="row"><div class="col-12"><div class="card"><div class="card-header d-flex align-items-center"><h4>New Customers</h4><img class="customerimg ms-auto"${ssrRenderAttr("src", _imports_0)} accept="image/*" alt="customer image"></div><div class="card-body"><form><div class="row"><div class="col-12 col-sm-12 col-md-6 col-lg-4"><label for="file">Photo:</label><input type="file" name="file" id="file" class="form-control" required=""></div><div class="col-12 col-sm-12 col-md-6 col-lg-4"><label for="name">Name:</label><input${ssrRenderAttr("value", unref(form).name)} type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name.." required=""></div><div class="col-12 col-sm-12 col-md-6 col-lg-4"><label for="customer_id">Customer Id:</label><input${ssrRenderAttr("value", unref(form).customer_id)} type="text" name="customer_id" id="customer_id" class="form-control" placeholder="Enter Customer Id.." required="">`);
      if (unref(page).props.errors.customer_id) {
        _push(`<span class="text-danger"><i class="fa fa-exclamation-circle"></i> ${ssrInterpolate(unref(page).props.errors.customer_id)}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><div class="col-12 col-sm-12 col-md-6 col-lg-4"><label for="phone">Phone:</label><input${ssrRenderAttr("value", unref(form).phone)} type="number" name="phone" id="phone" class="form-control" placeholder="Enter Phone.." required="">`);
      if (unref(page).props.errors.phone) {
        _push(`<span class="text-danger"><i class="fa fa-exclamation-circle"></i> ${ssrInterpolate(unref(page).props.errors.phone)}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><div class="col-12 col-sm-12 col-md-6 col-lg-4"><label for="email">Email:</label><input${ssrRenderAttr("value", unref(form).email)} type="email" name="email" id="email" class="form-control" placeholder="Enter Email.." required="">`);
      if (unref(page).props.errors.email) {
        _push(`<span class="text-danger"><i class="fa fa-exclamation-circle"></i> ${ssrInterpolate(unref(page).props.errors.email)}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><div class="col-12 col-sm-12 col-md-6 col-lg-4"><label for="village">Village:</label><input${ssrRenderAttr("value", unref(form).village)} type="text" name="village" id="village" class="form-control" placeholder="Enter Village.." required=""></div><div class="col-12 col-sm-12 col-md-6 col-lg-4"><label for="nationals">National Number:</label><input${ssrRenderAttr("value", unref(form).nationals)} type="text" name="nationals" id="nationals" class="form-control" placeholder="Enter National Number.." required=""></div><div class="col-12 col-sm-12 col-md-6 col-lg-4"><label for="father">Father:</label><input${ssrRenderAttr("value", unref(form).father)} type="text" name="father" id="father" class="form-control" placeholder="Enter Father Name.." required=""></div><div class="col-12 col-sm-12 col-md-6 col-lg-4"><label for="mother">Mother:</label><input${ssrRenderAttr("value", unref(form).mother)} type="text" name="mother" id="mother" class="form-control" placeholder="Enter Mother Name.." required=""></div><div class="col-12 col-sm-12 col-md-6 col-lg-4"><label for="password">Password:</label><input${ssrRenderAttr("value", unref(form).password)} type="password" name="password" id="password" class="form-control" required=""></div><div class="col-12 col-sm-12 col-md-6 col-lg-4 mt-4"><input${ssrIncludeBooleanAttr(Array.isArray(unref(form).mobile) ? ssrLooseContain(unref(form).mobile, null) : unref(form).mobile) ? " checked" : ""} type="checkbox" name="mobile" id="mobile"><label for="mobile" class="ms-1"> Are You Mobile Send SMS: </label></div><div class="col-12 col-sm-12 col-md-6 col-lg-4 mt-4"><input${ssrIncludeBooleanAttr(Array.isArray(unref(form).mail) ? ssrLooseContain(unref(form).mail, null) : unref(form).mail) ? " checked" : ""} type="checkbox" name="mail" id="mail"><label for="mail" class="ms-1"> Are You Email Send SMS: </label></div><div class="col-12 mt-3"><button type="submit" class="btn btn-outline-primary form-control createBtn">Save</button></div></div></form></div></div></div></div></article>`);
    };
  }
};
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Admin/Customes/CreateComponent.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const _sfc_main = {
  __name: "Create",
  __ssrInlineRender: true,
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      const _component_AdminLayout = resolveComponent("AdminLayout");
      _push(`<!--[-->`);
      _push(ssrRenderComponent(unref(Head), { title: "Customer Index Page" }, null, _parent));
      _push(ssrRenderComponent(_component_AdminLayout, null, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_sfc_main$1, null, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_sfc_main$1)
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
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Admin/Customers/Create.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as default
};
