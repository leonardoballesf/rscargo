$(document).ready(function(){
    localStorage.removeItem('h_menu_active_id');
    localStorage.removeItem('v_menu_active_id');
    localStorage.setItem("v_menu_active_id", "v_menu_index");
    localStorage.setItem("h_menu_active_id", "h_menu_index");
    localStorage.setItem("op_menu-open", "op_principal");
});