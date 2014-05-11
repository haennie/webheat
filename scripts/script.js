
function show_menu(clicked_id) {
    
    var menu = document.getElementById(clicked_id);
    
    var value = (menu.style.height == 'auto') ? 0 : 'auto'; 
    menu.style.height = value;
    
    var display = (menu.style.display == 'block') ? 'none' : 'block'; 
    menu.style.display =  display;
    
}