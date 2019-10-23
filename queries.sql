/*
 * Для заданного списка товаров получить названия всех категорий, в которых представлены товары
 * Выборка для нескольких товаров 
 * Пример: ids = (9, 14, 6, 7, 2)
 */
SELECT DISTINCT c.title
FROM category as c
JOIN product_category as pc ON pc.category_id = c.id
WHERE pc.product_id IN (1, 2, 3, 4);

/*
 * Для заданной категории получить список предложений всех товаров из этой категории
 * Каждая категория может иметь несколько подкатегорий
 * Пример: выбираю все товары из категории компьютеры (id = 2) и подкатегории (id = 3(ноутбуки), id = 4(планшеты), id = 5(гибриды))
 */
SELECT DISTINCT p.title
FROM product as p
JOIN product_category as pc ON pc.product_id = p.id
WHERE pc.category_id IN (SELECT id FROM category WHERE id = 1
						 UNION
						 SELECT id FROM category WHERE parent_id = 1);

/*
 * Для заданного списка категорий получить количество уникальных товаров в каждой категории
 * Выборка для нескольких категорий 
 * Пример: ids = (2, 3, 4)
 */
SELECT c.title as category_title, COUNT(DISTINCT pc.product_id) as product_number
FROM category as c
JOIN product_category as pc ON pc.category_id = c.id
WHERE pc.category_id IN (1, 4)
GROUP BY category_title;

/*
 * Для заданного списка категорий получить количество единиц каждого товара который входит в указанные категории
 * Выборка для нескольких категорий
 * Пример: ids = (3, 4, 5)
 */
SELECT c.title as category_title, COUNT(pc.product_id) as product_number
FROM category as c
JOIN product_category as pc ON pc.category_id = c.id
WHERE pc.category_id IN (1, 4)
GROUP BY category_title;
