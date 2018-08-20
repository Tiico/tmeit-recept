<div class="container">
    <?php if($this->session->userdata('logged_in')) : ?>
    <h2 class="display-4">Add Recipe</h2>
    <p>Add your recipe with the proportions for 1 serving!</p>
    <br>

    <button value="1" onclick="test(this.value)" class="btn btn-primary">MOAR INPUTZ</button>   
    <br><br>


    <div id="FormID" class="form-control">
        <?php echo form_open('Recipes/addRecipe') ?>
            <p></p><input type="submit" value="Submit" class="btn btn-success">
        <?php echo form_close(); ?>
    </div>

    <script>
        var i = 0; /* Set Global Variable i */

        function test(number){
            generateInputs();
        }
        function increment(){
            i += 1; /* Function for automatic increment of field's "Name" attribute. */
        }
        function resetElements(){
            document.getElementById('FormID').innerHTML = '';            
        }
        function removeElement(parentDiv, childDiv){
            if (childDiv == parentDiv){
                alert("The parent div cannot be removed.");
            }
            else if (document.getElementById(childDiv)){
                var child = document.getElementById(childDiv);
                var parent = document.getElementById(parentDiv);
                parent.removeChild(child);
            }
            else{
                alert("Child div has already been removed or does not exist.");
                return false;
            }
        }
        function generateInputs(){
            var r = document.createElement('span');

            var input = document.createElement("input");
            input.setAttribute("type", "text");
            input.setAttribute("placeholder", "Ingredient");
            var g = document.createElement("IMG");
            g.setAttribute("src", "<?php echo asset_url(); ?>images/delete.png");
            increment();
            input.setAttribute("Name", "ingredient_" + i);
            r.appendChild(input);
            r.setAttribute("id", "id_" + i);
            input.style.cssText = "width:60%; margin-right: 3%;"
            r.appendChild(input);

            var a = document.createElement("input")
            a.type = "number";
            a.name = "amount";
            a.placeholder = "Amount(g)"
            a.id = "amount1";       
            a.style.cssText = "margin-right: 10%;"
            r.appendChild(a);

            g.setAttribute("onclick", "removeElement('FormID','id_" + i + "')");
            r.appendChild(g);

            document.getElementById("FormID").appendChild(r);
        }

    </script>


    <?php endif; ?>





    <!-- Logged Out View -->
    <?php if(!$this->session->userdata('logged_in')) : ?>
    <p >In order to add a recipe you must be logged in. Either log in or register a new account on the link below.</p>
    <a href="<?php echo base_url(); ?>users/register">Register here</a>
    <?php endif; ?>
</div>