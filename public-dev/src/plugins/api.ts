import axios from "axios";

axios.defaults.withCredentials = true;
axios.defaults.xsrfCookieName = "XSRF-TOKEN";

const { APP_URL } = import.meta.env;

/**
 * LOGIN
 */

export const apiLogin = (email: string, password: string, remember: boolean) =>
    axios.post(
        `${APP_URL}/api/login`,
        {
            email: email,
            password: password,
            remember: remember,
        },
        {
            headers: {
                Accept: "application/json",
            },
        }
    );
export const apiForgotPassword = (email: string) => 
    axios.post(
        `${APP_URL}/api/forgot-password`,
        {
            email: email,
        },
        {
            headers: {
                Accept: "application/json",
            },
        }
);
export const apiCheckToken = (token: string) => axios.get(`${APP_URL}/api/reset-password/${token}`);
export const apiResetPassword = (email: string, password: string, token: string) => 
    axios.post(
        `${APP_URL}/api/reset-password`,
        {
            email: email,
            password: password,
            token: token
        }
);
export const apiLogout = () => axios.get(`${APP_URL}/api/logout`, {
    headers: {
        Accept: "application/json",
    },
});
export const apiCsrfCookie = () =>
    axios.get(`${APP_URL}/sanctum/csrf-cookie`, {
        headers: {
            Accept: "application/json",
        },
    });
export const apiUser = () => axios.get(`${APP_URL}/api/user`);
export const apiGetData = (offset: any, limit: any, order: string, sort: string) => 
    axios.get(`${APP_URL}/api/data`,
    {
        params: {
            offset: offset,
            limit: limit,
            order: order,
            sort: sort
        }
    }
)
