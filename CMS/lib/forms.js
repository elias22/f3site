/* Rozszerzenie klasy Request() */

//Przejmij w�adz� nad onSubmit()
Request.prototype.setForm=function(name,rules)
{
	var self=this;	
	document.forms[name].onsubmit=function()
	{
		if(self.sendForm(name,rules)) return true; else return false;
	};
}

//Wy�lij formularz
Request.prototype.sendForm=function(name,rules)
{
	var form=document.forms[name];
	var elem=form.elements;

	//Warunki
	if(typeof rules!='undefined')
	{
		for(var i in rules)
		{
			if(this.r[i]=='NUM')
			{
				if(typeof this.e[this.r.name]!='number')
				{
					if(this.rt[i]!='') alert(this.rt[i]); //Alert
					this.e[this.r.name].focus();
					return false;
				}
			}
			/* INNE? */
		}
		return true;
	}

	//Zapytanie HTTP
	this.request.method=this.f.method;

	//Dodaj
	for(var i in elem)
	{
		if(elem.type)
		{
			switch(elem.type)
			{
				case 'radio':
					if(elem.checked) this.add(elem.name,elem.value); //Radio
					break;
				case 'checkbox':
					if(elem.checked) this.add(elem.name,elem.value||1); //Checkbox
					break;
				case 'text':
				case 'textarea':
				case 'hidden':
				case 'password':
					this.add(elem.name,elem.value); //Pola tekstowe
					break;
				case 'select':
				case 'select-one':
				case 'select-multiple':
					for(var i in elem.options)
					{
						if(elem.options[i].selected) this.add(elem.name,elem.options[i].value) //Pole wyboru
					}
					break;
			}
		}
	}

	//Wy�lij
	this.run(1);
}

Request.prototype.addForm = function(id)
{
	this.form = document.forms[id];
};
Request.prototype.watch = function(box,opt)
{
	var box  = d(box);
	var self = this;
	this.box = box;
	this.num = box.getElementsByTagName(opt.tag).length;
	this.limit = opt.limit || 30;
	this.mode = opt.mode || null;

	//G��boko�� przycisk�w wzgl�dem powtarzanego elementu lub nazwa znacznika
	if(opt.tag == undefined)
		this.depth = opt.depth || 1;
	else
		this.tag = opt.tag;

	//Zdefiniowano kod HTML do powielania?
	if(opt.html != undefined) this.html = opt.html;

	//Zdarzenie onclick dla obszaru powtarzanych element�w
	box.onclick = function(e)
	{
		e = e || event;
		var o = e.srcElement || e.target;
		if(!o.alt) return false;

		//Znajd� najbli�szy znacznik self.tag
		var node = o.parentNode;
		if(self.depth != undefined)
		{
			if(self.depth>1) while(++self.depth>1) { node = node.parentNode }
		}
		else
		{
			while(node.tagName != self.tag && node.parentNode) { node = node.parentNode }
		}

		//Wykryj, kt�ry przycisk wci�ni�to
		switch(o.alt)
		{
			case '+':
				if(self.num > self.limit) return false;
				if(self.html)
				{
					var newNode = self.html.cloneNode(true); newNode.style.display = 'block'
				}
				else
				{
					var newNode = node.cloneNode(true);
					if(self.mode == 'clean')
					{
						var list = newNode.getElementsByTagName('input');
						for(var i=0; i<list.length; i++) list[i].value = '';
					}
				}
				node.parentNode.insertBefore(newNode, node);
				self.num++;

				//Aktywuj pierwsze pole INPUT
				var list = newNode.getElementsByTagName('input');
				if(list.length>0) list[0].focus();
				
			break;

			case '-':
				node.parentNode.removeChild(node);
				self.num--;
			break;

			case '^': case 'UP':
				if(node.previousSibling) node.parentNode.insertBefore(node, node.previousSibling);
			break;

			case 'v': case 'DOWN':
				if(node.nextSibling) node.parentNode.insertBefore(node.nextSibling, node);
			break;
		}
		return false; //Nie wysy�aj formularza
	};
};

//Nowy element
Request.prototype.addItem = function()
{
	if(this.num > this.limit || this.html == undefined) return false;
	with(this.box.appendChild(this.html.cloneNode(true)))
	{
		style.display = 'block';
		var list = getElementsByTagName('input'); if(list.length>0) list[0].focus();
	}
	this.num++;
}