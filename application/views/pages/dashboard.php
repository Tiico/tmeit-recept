<div class="container">
    <?php if($this->session->userdata('logged_in')) : ?>
    <h2 class="display-4">Add Recipe</h2>
    <p>Add your recipe with the proportions for 1 serving!</p>
    <br>

    <select type="number" id="test" onchange="test(this.value)">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
    </select>


    <div id="FormID">


    </div>

    <script>

        function test(number){
            resetElements();
            for(var i = 0; i < number; i++){
                generateInputs();
            }
        }

        var i = 0; /* Set Global Variable i */
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
            var y = document.createElement("INPUT");
            y.setAttribute("type", "text");
            y.setAttribute("placeholder", "Name");
            var g = document.createElement("IMG");
            g.setAttribute("src", "<?php echo asset_url(); ?>images/delete.png");
            increment();
            y.setAttribute("Name", "textelement_" + i);
            r.appendChild(y);
            g.setAttribute("onclick", "removeElement('FormID','id_" + i + "')");
            r.appendChild(g);
            r.setAttribute("id", "id_" + i);
            document.getElementById("FormID").appendChild(r);
        }

        function generateForm(number){
            //create a form
            var f = document.createElement("form");
            f.setAttribute('method',"post");
            f.setAttribute('action',"Recipes/addRecipe");
            f.className = "form-control";

            //create input element
            var i = document.createElement("input");
            i.type = "text";
            i.name = "user_name";
            i.id = "user_name1";
            i.placeholder = "Enter ingredient";
            i.style.cssText = "width:60%; margin-right: 3%;"

            var a = document.createElement("input")
            a.type = "number";
            a.name = "amount";
            a.placeholder = "Amount(g)"
            a.id = "amount1";       
            a.style.cssText = "margin-right: 10%;"


            //create a button
            var s = document.createElement("input");
            s.type = "submit";
            s.value = "Submit";
            s.className = "btn btn-success";

            // add all elements to the form


            f.appendChild(i);
            f.appendChild(a);
            f.appendChild(s);

            var container = document.getElementById("FormID");
            var number = document.getElementById("test");

            // add the form inside the body
            container.appendChild(f);   //using jQuery or
        }

    </script>


    <?php endif; ?>





    <!-- Logged Out View -->
    <?php if(!$this->session->userdata('logged_in')) : ?>
    <p >In order to add a recipe you must be logged in. Either log in or register a new account on the link below.</p>
    <a href="<?php echo base_url(); ?>users/register">Register here</a>
    <?php endif; ?>
</div>