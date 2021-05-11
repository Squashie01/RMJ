function loadCategory(category){
	$.get("category.php",
	{
		category: category
	}
	);
}