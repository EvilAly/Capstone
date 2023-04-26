drop DATABASE recipes;

CREATE OR REPLACE DATABASE Recipes;

USE Recipes;


CREATE TABLE userInfo (
	userID int AUTO_INCREMENT PRIMARY KEY,
	firstName VARCHAR(50) NOT NULL,
	lastName VARCHAR(50) NOT NULL,
	emailAddress VARCHAR(75) NOT NULL,
	pass varchar(25) NOT NULL
);

CREATE TABLE shoppingList (
	userID int NOT NULL,
	amount DOUBLE NOT NULL,
	ingredient VARCHAR(75) NOT NULL,
	FOREIGN KEY (userID) REFERENCES userInfo(userID)
);

CREATE TABLE categories (
	catID int AUTO_INCREMENT NOT NULL PRIMARY KEY,
	catName VARCHAR(25)
);

CREATE TABLE recipes (
	recipeID int AUTO_INCREMENT NOT NULL PRIMARY KEY,
	recName VARCHAR(150) NOT NULL,
	catID int NOT NULL,
	prepTime VARCHAR(25),
	cookTime VARCHAR(25),
	ingredients JSON,
	directions JSON,
	FOREIGN KEY (catID) REFERENCES categories(catID)
);

CREATE TABLE nutriValues (
	recipeID int NOT NULL,
	calories double, 
	fat double,
	cholesterol double, 
	sodium double,
	carbs double,
	sugar double,
	calcium double,
	protein double,
	FOREIGN KEY (recipeID) REFERENCES recipes(recipeID)
);

CREATE TABLE savedRec (
	userID int NOT NULL,
	recipeID int NOT NULL,
	FOREIGN KEY (userID) REFERENCES userInfo(userID),
	FOREIGN KEY (recipeID) REFERENCES recipes(recipeID)
);

INSERT INTO categories (catName) VALUES
	('Breakfast'),
	('Appetizers'),
	('Dinner'),
	('Dessert');
	
INSERT INTO recipes (recName, catID, prepTime, cookTime, ingredients, directions) VALUES
	('Sweet and Spicy Bacon Wrapped Chicken Bites', 2, '10 minutes', '13 minutes', 
		'[{"quantity": "1 lb", "name": "chicken breast - 1 inch pieces"}, {"quantity": "6 slices", "name":"bacon - cut into thirds"},
		{"quantity": "1/3 cup", "name":"brown sugar"}, {"quantity": "1/2 Tbsp", "name":"chili powder"}, {"quantity": "1/8 tsp", "name":"cayenne pepper"}]',
		'[{"step": "1", "instruction":"Place a piece of chicken on one end of a piece of bacon. Roll it up and secure each one with a toothpick."},
		{"step": "2", "instruction":"Place a piece of chicken on one end of a piece of bacon. Roll it up and secure each one with a toothpick."},
		{"step": "3", "instruction":"Combine brown sugar, chili powder, and cayenne pepper in a bowl and stir. Coat each piece of bacon wrapped chicken in this mixture and set aside."},
		{"step": "4", "instruction":"Place bacon wrapped pieces in Air Fryer, making sure they have space between them. Cook at 390 for 13-15 minutes."}]');
		
INSERT INTO recipes (recName, catID, prepTime, cookTime, ingredients, directions) VALUES
	('Loaded Breakfast Casserole', 1, '20 minutes', '40 minutes', 
		'[{"quantity": "1 lb", "name": "bacon, cooked and chopped"}, {"quantity": "12 ounces", "name":"breakfast sausage roll, uncooked, or ground sausage of choice"},
		{"quantity": "28 ounces", "name":"frozen potatoes with peppers and onions, thawed"}, {"quantity": "2 cups", "name":"shredded cheddar cheese"}, 
		{"quantity": "12", "name":"large eggs"}, {"quantity": "1/2 cup", "name":"whole milk"}, {"quantity": "1-1/2 tsp", "name":"kosher salt"},
		{"quantity": "1 tsp", "name":"ground black pepper"}, {"quantity": "1 tsp", "name":"garlic powder"}]',
		'[{"step": "1", "instruction":"Preheat oven to 375. Grease insides of a 9x13-inch baking pan with non-stick cooking spray."},
		{"step": "2", "instruction":"In a large skillet over medium heat, cook the sausage until browned, crumbling it with a spatula as it cooks."},
		{"step": "3", "instruction":"Add potatoes, sausage, bacon and cheese to the casserole dish. Toss to combine."},
		{"step": "4", "instruction":"In a large bowl combine eggs, milk, garlic, salt and pepper. Whisk until completely combined.Pour the egg mixture over the hash brown mixture."}, 
		{"step": "5", "instruction":"Bake for 35-40 minutes until a knife inserted in the center comes out clean."}]');
		
INSERT INTO recipes (recName, catID, prepTime, cookTime, ingredients, directions) VALUES
	('Blackberry Cobbler', 4, '15 minutes', '1 hour', 
		'[{"quantity": "1/2 stick", "name": "butter, melted"}, {"quantity": "1-1/4 cups, plus 2 Tbsp", "name":"sugar"},
		{"quantity": "1 cup", "name":"self-rising flour"}, {"quantity": "1 cup", "name":"whole milk"}, {"quantity": "2 cups", "name":"fresh (or frozen) blackberries"}]',
		'[{"step": "1", "instruction":"Preheat the oven to 350 degrees. Grease a 3-qt baking dish with butter."},
		{"step": "2", "instruction":"In a medium bowl, whisk 1 cup sugar with the flour and milk. Whisk in the melted butter."},
		{"step": "3", "instruction":"Rinse the blackberries and pat them dry."},
		{"step": "4", "instruction":"Pour the batter into the baking dish. Sprinkle the blackberries evenly over the top of the batter."}, 
		{"step": "5", "instruction":"Sprinkle ¼ cup sugar over the blackberries. Bake until golden brown and bubbly, about 1 hour."},
		{"step": "6", "instruction":"When 10 minutes of the cooking time remains, sprinkle the remaining 2 tablespoons sugar over the top."}]');
		
INSERT INTO recipes (recName, catID, prepTime, cookTime, ingredients, directions) VALUES
	('Steak Gorgonzola with Creamy Alfredo Sauce', 3, '25 minutes', '25 minutes', 
		'[{"quantity": "1- 10 oz", "name": "filet mignon steak"}, {"quantity": "1 tsp", "name":"olive oil"}, {"quantity": "4", "name":"sun-dried tomatoes in oil, roughly chopped"},
		{"quantity": "2 oz", "name":"gorgonzola cheese"}, {"quantity": "8 oz", "name":"fettuccine or linguine noodles"},
		{"quantity": "1 stick", "name":"butter"}, {"quantity": "1 cup", "name":"heavy cream"}, {"quantity": "1 cup", "name":"freshly shredded parmesan cheese"}, 
		{"quantity": "1/2 tsp", "name":"garlic powder"}, {"quantity": "2 cups", "name":"fresh spinach"}, {"quantity": "1/2 cup", "name":"balsamic vinegar"}, 
		{"quantity": "1 Tbsp", "name":"brown sugar"}]',
		'[{"step": "1", "instruction":"Begin by cutting your filet mignon into smaller pieces (each piece will equal about 3-4 bites, for reference)."},
		{"step": "2", "instruction":"Take each piece and gently flatten with the palm of your hand."},
		{"step": "3", "instruction":"Season with salt and pepper, and a little olive oil."},
		{"step": "4", "instruction":"Place into a hot skillet, and sear each side. Cook until they reach your desired doneness."}, 
		{"step": "5", "instruction":"Once they are done cooking, put on a plate and set to the side."},
		{"step": "6", "instruction":"Add balsamic vinegar and brown sugar to a small sauce pan. Cook on medium high heat until sugar melts."},
		{"step": "7", "instruction":"Cook for 4-5 minutes until sauce begins to thicken."},
		{"step": "8", "instruction":"Turn heat off, and set to the side. Sauce will continue to thicken as it cools."},
		{"step": "9", "instruction":"In a separate pot, cook pasta according to packaging instructions."},
		{"step": "10", "instruction":"In a deep skillet, begin to make your sauce. Melt butter and add heavy cream, whisking them together."},
		{"step": "11", "instruction":"Add freshly grated Parmesan cheese and stir to combine. Add garlic powder."},
		{"step": "12", "instruction":"Cook down for a few minutes, until the sauce begins to thicken."},
		{"step": "13", "instruction":"Add cooked pasta to the sauce skillet and stir to coat."},
		{"step": "14", "instruction":"Once the sauce has reached your desired consistency, turn down heat and add fresh spinach."},
		{"step": "15", "instruction":"Place a portion of pasta down, and top with steak, a drizzle of the balsamic, crumbled gorgonzola, and chopped sun dried tomatoes."}]');
		
INSERT INTO recipes (recName, catID, prepTime, ingredients, directions) VALUES
	('Chia Pudding', 4, '2 hours set time','[{"quantity": "1/4 cup"," name": "chia seeds"}, {"quantity": "1 cup", "name": "almond milk"},
	{"quantity": "2 tsp", "name": "honey"}, {"quantity": "1 tsp", "name": "pure vanilla extract"}, {"quantity": "5", "name": "Sliced strawberries"},
	{"quantity": "8", "name": "blueberries"}, {"quantity": "8", "name": "blackberries"}, {"quantity": "1/8 cup", "name": "granola"}, {"quantity": "","name": "crushed walnuts(optional)"}]',
	'[{"step": "1", "instruction": "In a medium bowl, whisk to combine chia seeds, almond milk, honey, and vanilla."},
	{"step": "2", "instruction": "Cover and refrigerate until thick, 2 hours up to overnight."},
	{"step": "3", "instruction": "Serve with mixed in fruit granola and nuts"}]');

INSERT INTO recipes (recName, catID, cookTime, ingredients, directions) VALUES
	('Air Fryer Buffalo Cauliflower', 2, '15 minutes', '[{"quantity": "1 head", "name": "cauliflower"},
	{"quantity": "3 tbsp", "name": "Frank’s Red-hot Sauce"}, {"quantity": "2 tbsp", "name": "butter, melted"},
	{"quantity": "1/4 tsp", "name": "garlic powder"}, {"quantity": "1 tbsp", "name": "cornstarch"}]',
	'[{"step": "1", "instruction": "Break head of cauliflower into same-sized florets. In a large bowl, butter, and garlic powder."},
	{"step": "2", "instruction": "Add cauliflower toss to combine. Add cornstarch toss to coat."},
	{"step": "3", "instruction": "Using tongs and working in batches if necessary to avoid overcrowding, place cauliflower in an air-fryer basket."},
	{"step": "4", "instruction": "Cook at 350°, tossing halfway through, until browned in spots, about 15 minutes."}]');
	
INSERT INTO recipes (recName, catID, prepTime, cookTime, ingredients, directions) VALUES
	('Herb Baked Salmon with Baked Zucchini and Brown Rice', 3, '30 minutes', '50 minutes',
	'[{"quantity": "1 Tbsp", "name": "lemon juice"}, {"quantity": "2 Tbsp", "name": "olive oil"}, 
	{"quantity": "2 tsp", "name": "McCormick Salt Free Garlic and Herb Seasoning"}, {"quantity": "1 lb", "name": "Salmon fillets"},
	{"quantity": "1 pinch", "name": "salt"}, {"quantity": "2", "name": "Zucchini"}, {"quantity": "2-1/2 cups", "name": "water or broth"},
	{"quantity": "1 cup", "name": "brown rice"}]',
	'[{"step": "1", "instruction": "Preheat oven to 350°F. Mix lemon juice, oil and McCormick Seasoning in small bowl until well blended."},
	{"step": "2", "instruction": "Place salmon on foil-lined baking pan. Brush with oil mixture."},
	{"step": "3", "instruction": "Bake 20 minutes or until fish flakes easily with fork. Remove skin before eating."},
	{"step": "4", "instruction": "While salmon is cooking, slice zucchini into wide thick strips. Mix olive oil, salt and zucchini together."},
	{"step": "5", "instruction": "Place zucchini on the pan individually. Put zucchini in the same oven and bake for 10 minutes."},
	{"step": "6", "instruction": "Combine water (or broth) and rice in a medium saucepan. Bring to a boil."},
	{"step": "7", "instruction": "Reduce heat to low, cover and simmer until tender and most of the liquid has been absorbed, 40 to 50 minutes."},
	{"step": "8", "instruction": "Let stand for 5 minutes, then fluff with a fork."}]');
	
INSERT INTO recipes (recName, catID, ingredients, directions) VALUES
	('Breakfast omelet', 1, '[{"quantity": "1/8 cup", "name": "onions, diced"}, {"quantity": "1/8 cup", "name": "green peppers, diced"},
	{"quantity": "1 tsp", "name": "jalapeno, diced"}, {"quantity": "1/8 cup", "name": "mushroom, diced"}, {"quantity": "1/8 cup", "name": "zucchini diced"},
	{"quantity": "1/8 cup", "name": "cooked turkey sausage"}, {"quantity": "1/8 cup", "name": "spinach"}, {"quantity": "2", "name": "large eggs"},
	{"quantity": "1", "name": "olive oil spray"}]',
	'[{"step": "1", "instruction": "Heat medium size sauté pan on medium. Spray pan with olive oil once pan is hot."},
	{"step": "2", "instruction": "Mix all ingredients in a bowl. Pour mix in sauté pan."},
	{"step": "3", "instruction": "Cook until egg is not runny on top then flip over and cook on opposite side."},
	{"step": "4", "instruction": "Once both sides are golden brown remove and enjoy."}]');
	
INSERT INTO recipes (recName, catID, prepTime, cookTime, ingredients, directions) VALUES
    ('Chorizo Cocotte', 1, '5 minutes', '15 minutes', 
	'[{"quantity": "10 oz", "name": "Chorizo Sausage"}, {"quantity": "1/4 cup", "name":"Heavy Cream"},
	{"quantity": "4 Tbsp", "name":"goat cheese"},{"quantity": "2", "name":"eggs"}]',
	'[{"step": "1", "instruction": "Fill an oven safe ramekin with sausage cream and goat cheese and bake at 400 for 15 minutes."},
	{"step": "2", "instruction": "Poach eggs in last 2 minutes of cooking and add to ramekin."},
	{"step": "3", "instruction":"Salt and pepper to taste and serve with fresh bread."}]');
	
INSERT INTO recipes (recName, catID, prepTime, cookTime, ingredients, directions) VALUES
    ('Spicy Jalapeno Queso ', 2, '10 minutes', '20 minutes', 
	'[{"quantity": "16 oz", "name": "Colby jack shredded cheese"}, {"quantity": "12 oz", "name":"Queso Fresco"},
	{"quantity": "12 oz", "name": "Cornana Beer"},{"quantity": "2", "name": "Jalapenos Diced"}]',
	'[{"step": "1", "instruction":"Line a medium skillet with tin foil."},
	{"step": "2", "instruction":"Add cheeses, beer, and jalapenos to skillet and heat over high heat till bubbling."},
	{"step": "3", "instruction":"Stir until all ingredients are combined."},
	{"step": "4", "instruction":"Serve immediately after all ingredients are combined."}]');
	
INSERT INTO recipes (recName, catID, prepTime, cookTime, ingredients, directions) VALUES
    ('Beef Pot Roast ', 3, '30 minutes', '3-4 hours minutes', 
	'[{"quantity": "1", "name": "3-4 pound chuck roast "}, {"quantity": "2 Tbsp", "name":"olive oil"},
	{"quantity": "2", "name":"onions, peeled and halved"},{"quantity": "7", "name":"carrots, unpeeled, cut into 2-inch pieces"},
	{"quantity": "1 cup", "name":"red wine"},{"quantity": "3 cups", "name":"beef broth"},{"quantity": "2", "name":"sprigs fresh rosemary"},
	{"quantity": "2", "name":"sprigs fresh thyme"}]',
	'[{"step": "1", "instruction": "Preheat the oven to 275 degrees F."},
	{"step": "2", "instruction": "Generously salt and pepper the chuck roast."},
	{"step": "3", "instruction": "Heat the olive oil in large pot or Dutch oven over medium-high heat. Add the halved onions to the pot, browning them on both sides. Remove the onions to a plate"},
	{"step": "4", "instruction": "Throw the carrots into the same very hot pot and toss them around a bit until slightly browned, about a minute or so. Reserve the carrots with the onions"},
	{"step": "5", "instruction": "If needed, add a bit more olive oil to the very hot pot. Place the meat in the pot and sear it for about a minute on all sides until it is nice and brown all over. Remove the roast to a plate"},
	{"step": "6", "instruction": "With the burner still on high, use either red wine or beef broth (about 1 cup) to deglaze the pot, scraping the bottom with a whisk. Place the roast back into the pot and add enough beef stock to cover the meat halfway"},
	{"step": "7", "instruction": "Add in the onions and the carrots, along with the fresh herbs"},
	{"step": "8", "instruction": "Put the lid on, then roast for 3 hours for a 3-pound roast. For a 4 to 5-pound roast, plan on 4 hours. The roast is ready when it\'s fall-apart tender"}]');
	
INSERT INTO recipes (recName, catID, prepTime, cookTime, ingredients, directions) VALUES
    ('Crème Brulee ', 4, '10 minutes', '35 minutes', 
	'[{"quantity": "2 cups", "name": "heavy or light cream"}, {"quantity": "1", "name":"vanilla bean, split lengthwise"},
	{"quantity": "1/8 tsp", "name": "salt"},{"quantity": "5", "name": "egg yolks"},{"quantity": "1/2 cup", "name":"sugar"}]',
	'[{"step": "1", "instruction": "Heat oven to 325 degrees. In a saucepan, combine cream, vanilla bean and salt and cook over low heat just until hot."},
	{"step": "2", "instruction": "Let sit for a few minutes, then discard vanilla bean."},
	{"step": "3", "instruction": "In a bowl, beat yolks and sugar together until light."},
	{"step": "4", "instruction": "Stir about a quarter of the cream into egg-sugar mixture, then pour mixture into remaining cream and stir."},
	{"step": "5", "instruction": "Pour into four 6-ounce ramekins and place ramekins in a baking dish; fill dish with boiling water halfway up the sides of the dishes."},
	{"step": "6", "instruction": "Bake for 30 to 40 minutes, or until centers are barely set. Cool completely. Refrigerate for several hours and up to a couple of days"},
	{"step": "7", "instruction": "When ready to serve, top each custard with about a teaspoon of sugar in a thin layer."},
	{"step": "8", "instruction": "Place ramekins in a broiler 2 to 3 inches from heat source. Turn on broiler."},
	{"step": "9", "instruction": "Cook until sugar melts and browns or even blackens a bit, about 5 minutes. Serve within two hours"}]');
	

 INSERT INTO recipes (recName, catID, prepTime, cookTime, ingredients, directions) VALUES
    ('Breakfast Burrito', 1, '15 minutes', '30 minutes', 
	'[{"quantity": "8 slices", "name": "Bacon"}, {"quantity": "16 oz", "name":"package frozen hash browns"},
	{"quantity": "8", "name": "large eggs"}, {"quantity": "1/3 cup", "name":"milk"}, {"quantity": "4 Tbsp", "name":"butter"},
	{"quantity": "", "name": "salt,to taste"}, {"quantity": "", "name":"pepper,to taste"}, {"quantity": "4", "name":"large flour tortillas"},
	{"quantity": "1/2 cup", "name": "shredded cheddar cheese"}, {"quantity": "1", "name":"ripe avocado,sliced"},
	{"quantity": "", "name": "Hot sauce,for serving"}, {"quantity": "", "name":"sour cream,for serving"}, {"quantity": "", "name":"salsa,for serving"}]',
	'[{"step": "1", "instruction": "In a large skillet over medium heat, cook bacon, working in batches if necessary, until crispy, about 8 minutes per batch."},
	{"step": "2", "instruction": "Drain on a paper towel-lined plate and pour off half the fat."},
	{"step": "3", "instruction": "Cook hash browns according to package directions in bacon fat and transfer to a plate."},
	{"step": "4", "instruction": "In a medium bowl, whisk together eggs and milk."},
	{"step": "5", "instruction": "Wipe out skillet, place over medium heat, and melt butter."},
	{"step": "6", "instruction": "When butter is just starting to foam, reduce heat to medium-low and add beaten eggs."},
	{"step": "7", "instruction": "Using a rubber spatula, stir occasionally until soft curds form. Season with salt and pepper."},
	{"step": "8", "instruction": "Assemble burritos: In the center of each tortilla, layer hash browns, scrambled eggs, cheese, two slices of bacon, and sliced avocado."},
	{"step": "9", "instruction": "Fold in the two sides and roll up tightly. Serve with hot sauce, sour cream and salsa."}]');
   
	
INSERT INTO recipes (recName, catID, prepTime, cookTime, ingredients, directions) VALUES
    ('Spinach Dip', 2, '10 minutes', '20 minutes', 
	'[{"quantity": "1 can", "name": "artichokes, drained and chopped"}, {"quantity": "16 oz", "name":"frozen spinach, defrosted"},
	{"quantity": "1 Tbsp", "name": "olive oil"}, {"quantity": "2 Tbsp", "name":"minced garlic cloves"}, {"quantity": "1/2", "name":"medium onion, diced"},
	{"quantity": "1/2 tsp", "name": "salt"},{"quantity": "1 tsp", "name":"black pepper"},{"quantity": "1-1/2 cup", "name":"heavy cream"},{"quantity": "3/4 cup", "name":"shredded mozzarella cheese"},
	{"quantity": "2 Tbsp", "name": "shredded parmesan cheese"}]',
	'[{"step": "1", "instruction": "Preheat oven to 350 degrees. "},
	{"step": "2", "instruction": "Drain excess water from spinach."},
	{"step": "3", "instruction": "In a pan, on medium heat, add olive oil and onion and cook for 1-2 minutes."},
	{"step": "4", "instruction": "Once the onion is soften, add minced garlic"},
	{"step": "5", "instruction": "Turn heat down to medium-low and whisk in heavy cream."},
	{"step": "6", "instruction": "Stir in your artichoke, spinach, shredded parmesan, and 1/4 cup of the mozzarella."},	
	{"step": "7", "instruction": "Bring everything to a boil and mix continually until it thickens."},
	{"step": "8", "instruction": "Transfer to a baking dish and top with remaining mozzarella."},
	{"step": "9", "instruction": "Bake for about 20 minutes – broil if necessary."},
	{"step": "10", "instruction": "Serve immediately with dippers of choice."}]');
	
INSERT INTO recipes (recName, catID, prepTime, cookTime, ingredients, directions) VALUES
    ('Chicken Broccoli Rice Casserole', 3, '10 minutes', '50 minutes', 
	'[{"quantity": "2 Tbsp", "name": "butter"}, {"quantity": "2", "name":"boneless skinless chicken breasts,or 2 cups diced chicken"},
	{"quantity": "1 tsp", "name":"Italian seasoning"}, {"quantity": "1 tsp", "name":"salt"}, {"quantity": "1 tsp", "name":"pepper"},
	{"quantity": "2-1/2 cups", "name":"chicken broth"},{"quantity": "1 Tbsp", "name":"olive oil"},{"quantity": "1-1/4 cups", "name":"white long grain rice,uncooked"},
	{"quantity": "2 cups", "name":"fresh broccoli florets,uncooked"}, {"quantity": "10.5 oz", "name":"condensed cream of chicken soup"},
	{"quantity": "1/2 cup", "name":"milk"},{"quantity": "1/2 cup", "name":"sour cream"},{"quantity": "2 cups", "name":"shredded cheddar cheese,seperated"},
	{"quantity": "1/2 tsp", "name":"garlic powder"},{"quantity": "1 cup", "name":"ritz crackers,crushed,TOPPING"},{"quantity": "2 tbsp", "name":"melted butter,TOPPING"}]',
	'[{"step": "1", "instruction": "Note: This recipe is designed to allow you to prepare all of the casserole ingredients in one pot before transferring to a casserole dish for baking. Refer to your rice package for the amount of liquid and cooking time."},
	{"step": "2", "instruction": "Preheat oven to 350 degrees."},
	{"step": "3", "instruction": "Cut chicken into bite-sized pieces and season with Italian seasoning and desired amount of salt and pepper."},
	{"step": "4", "instruction": "Heat butter in a large pot over medium heat until melted."},
	{"step": "5", "instruction": "Add the chicken and cook until golden brown on all sides, about 5 minutes. Remove and set aside."},
	{"step": "6", "instruction": "Add the chicken broth, olive oil, and rice to the pot and bring to a boil, then reduce heat to a simmer."},
	{"step": "7", "instruction": "Cover tightly and cook for 6 minutes."},
	{"step": "8", "instruction": "Add the broccoli and replace the cover. Cook for 9 more minutes. Refrain from stirring."},
	{"step": "9", "instruction": "Turn off the heat and leave the cover on. Let the rice stand for 10 minutes, do not stir. Any rice on the bottom of the pot will release."},	
	{"step": "10", "instruction": "Add the cooked chicken, soup, milk, sour cream, optional seasonings, and half of the cheddar cheese."},
	{"step": "11", "instruction": "Add to a lightly greased 9 x 13 casserole dish and top with remaining cheese."},
	{"step": "12", "instruction": "Transfer to a baking dish and top with mozzarella."},
	{"step": "13", "instruction": "Cover and bake for 15 minutes."}]');
	
INSERT INTO recipes (recName, catID, prepTime, cookTime, ingredients, directions) VALUES
	('Layered Chocolate Pudding Dessert with Salted Pecan Crust', 4, '20 minutes', '4 to 6 Hours', 
	'[{"quantity": "1-1/2 cups", "name": "All-purpose Flour"}, {"quantity": "1/2 cup", "name": "packed brown sugar"},
	{"quantity": "3/4 tsp", "name": "kosher salt"},{"quantity": "1/3 cup", "name": "finely chopped pecans"}, {"quantity": "9 Tbsp", "name": "cold unsalted butter"},
	{"quantity": "2 (3.9 oz) Boxes", "name": "chocolate fudge instant pudding & pie filling"}, {"quantity": "4 cups", "name": "cold whole milk"},
	{"quantity": "12 oz", "name": "Cool Whip"}, {"quantity": "12 oz", "name": "cream cheese, softened"}, {"quantity": "1-1/2 cup", "name": "powdered sugar"},
	{"quantity": "2 oz", "name": "shaved dark chocolate from a bar"}]',
	'[{"step": "", "instruction": "For the salted pecan crust:"},
	{"step": "1", "instruction": "Preheat oven to 325° F. In a medium bowl, combine flour, brown sugar, salt, and pecans."},
	{"step": "2", "instruction": "Cut in butter with a rigid pastry cutter or a fork until crumbly."},
	{"step": "3", "instruction": "Press mixture evenly onto bottom of 9 x 13 inch pan."},
	{"step": "4", "instruction": "Bake for 18–20 minutes, or until crust is set and slightly browned. It should smell nice and toasty, buttery and nutty. Remove to wire rack to cool completely."},
	{"step": "", "instruction":"For the cream cheese layer:"},
	{"step": "5", "instruction": "With a blender, whip cream cheese and powdered sugar until completely smooth."},
	{"step": "6", "instruction": "With a rubber spatula, fold in 1-1/2 cups of Cool Whip until combined."},
	{"step": "7", "instruction": "Spread mixture onto cooled crust. Refrigerate while preparing the next layer."},
	{"step": "", "instruction":"For the chocolate pudding layer:"},
	{"step": "8", "instruction": "In a medium bowl, whisk pudding with milk for 2 minutes. Pudding will become more and more thick as you whisk."},
	{"step": "9", "instruction": "Spread pudding evenly over cream cheese layer."},
	{"step": "", "instruction":"For the Cool Whip layer:"},
	{"step": "10", "instruction": "Evenly spread remaining Cool Whip over chocolate pudding layer."},
	{"step": "11", "instruction": "Sprinkle with shaved chocolate."},
	{"step": "12", "instruction": "Refrigerate for 4 to 6 hours or overnight before serving."},
	{"step": "", "instruction": "This dessert can easily be made the day prior to serving. Always serve this dessert chilled."}]');

		
INSERT INTO nutriValues (recipeID, calories, fat, cholesterol, sodium, carbs, sugar, calcium, protein) VALUES
	(1, 339, 16, 94, 371, 18, 17, 24, 28),
	(2, 445, 34, 229, 925, 14, 1, 182, 21),
	(3, 484, 13.8, 36, 106, 87.6, 60.8, 97, 6.3),
	(4, 1017, 52.2, 336, 506, 42.8, 5.7, 26, 92.2),
	(5, 207, 12.2, 0, 0, 44.8, 27.6, 82, 7.3),
	(6, 79, 5.8, 15, 406, 5.5, 1.6, 16, 1.4),
	(7, 737, 24, 100, 134, 79.1, 3.6, 150, 53.6),
	(8, 133, 10.3, 116, 239, 1.1, 0.6, 20, 8.6),
	(9, 1005, 86.7, 424, 1342, 3.2, 1.6, 587, 8.6),
	(10, 168, 33, 124, 281, 15, 5, 548, 23),
	(11, 531, 21, 182, 1361, 15, 6, 0, 64),
	(12, 503, 41, 0, 122, 29, 29, 0, 5),
	(13, 973, 67.1, 461, 1637, 57.3, 3.9, 228, 36.7),
	(14, 337, 15.2, 80, 519, 11.3, 1.5, 409, 15),
	(15, 688, 38.9, 159, 184, 41.3, 3.3, 521, 42.4),
	(16, 986, 89.8, 190, 28, 190, 135.9, 406, 21.6);
	
	
	