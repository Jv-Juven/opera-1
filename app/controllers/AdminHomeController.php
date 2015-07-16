<?php

class AdminHomeController extends BaseController{
	
	public function addPoster()
	{
		$image = Input::get('image');

		$data = array(
			'image'=>$image
			);
		$rule = array(
			'image'=>'required|image'
			);
		$messages = array(
			'image.required' 	=> 1,
			'image.image'		=>2
			);
		$validation = Validator::make($data,$rule, $messages);

		if($validation->fails())
		{
			$number = $validation->messages()->all();
			if(($number[0]) == 1)
			{
				return Response::json(array('errCode'=>1, 'message'=>'还未上传图片！')));
			}
			return Response::json(array('errCode'=>2, 'message'=>'必须为jpeg, png, bmp 或 gif的图片格式！'));
		}

		$poster = new Poster;

		$poster->image = $image;

		if(!$poster->save())
		{
			return Response::json(array('errCode'=>3, 'message'=>'海报上传失败！'));
		}

		return Response::json(array('errCode'=>0, 'message'=>'海报上传成功！'));
	}	

	public function editPoster()
	{
		$image_id = Input::get('image_id');
		$image = Input::get('image');

		$data = array(
			'image'=>$image
			);
		$rule = array(
			'image'=>'required|image'
			);
		$messages = array(
			'image.required'	=> 1,
			'image.image'		=>2
			);
		$validation = Validator::make($data,$rule,$messages);

		if($validation->fails())
		{
			$number = $validation->messages()->all();
			if(($number[0]) == 1)
			{
				return Response::json(array('errCode'=>1, 'message'=>'还未上传图片！')));
			}
			return Response::json(array('errCode'=>2, 'message'=>'必须为jpeg, png, bmp 或 gif的图片格式！'));
		}

		$poster 		= Poster::find($image_id);
		$poster->image 	= $image;
		if(!$poster->save())
		{
			return Response::json(array('errCode'=>3, 'message'=>'修改失败！'));
		}

		return Response::json(array('errCode'=>0, 'message'=>'修改成功！'));
	}											

	public function deletePoster()
	{
		$image_id	= Input::get('image_id');
		$image 	= Poster::find($image_id);

		if(!$image->delete())
		{
			return Response::json(array('errCode'=>'1', 'message'=>'删除失败！'));
		}

		return Response::json(array('errCode'=>0, 'message'=>'删除成功！'));
	}

	public function contactUs()
	{
		$number 	= Input::get('number');
		$people 	= Input::get('people');
		$postcode 	= Input::get('postcode');
		$address 	= Input::get('address');
		$site 		= Input::get('site');

		$data = array(
			'number' 	=> $number,
			'people' 	=> $people,
			'postcode'	=> $postcode,
			'address' 	=> $address,
			'site' 		=> $site
			);
		$rules = array(
			'number' 	=> 'required|numeric',
			'people' 	=> 'required',
			'postcode' 	=> 'required|numeric|size:6',
			'address' 	=> 'required',
			'site' 		=> 'required'
			);
		$messages = array(
			'required' 		=> 1,
			'number.numeric' 	=> 2,
			'postcode.numeric'	=> 3,
			'postcode.size' 	=> 4
			);
		$validation = Validator::make($data, $rules,$messages);

		if($validation->fails())
		{
			$number = $validation->messages()->all();
			if($number[0] == 1)
			{
				return Response::json(array('errCode'=>1, 'message'=>'信息填写不完整！'));
			}
			if($number[0] == 2)
			{
				return Response::json(array('errCode'=>2, 'message'=>'电话号码必须为数字！'));
			}
			if($number[0] == 3)
			{
				return Response::json(array('errCode'=>3, 'message'=>'邮编必须为数字！'));
			}
			if($number[0] == 4)
			{
				return Response::json(array('errCode'=>4, 'message'=>'邮编必须为6位数字！'));
			}
		}

		$contact = contactUs::find(1);

		if($contact = null)
		{
			$contact = new contactUs;
		}

		$contact->number 	= $number;
		$contact->people 	= $people;
		$contact->postcode = $postcode;
		$contact->address 	= $address;
		$contact->site 	= $site;

		if(!$contact->save())
		{
			return Response::json(array('errCode'=>5, 'message'=>'保存失败！'));
		}

		return Response::json(array('errCode'=>0, 'message'=>'保存成功！'));
	}			

	public function addLink()
	{
		$image = Input::get('image');
		$site = Input::get('site');

		$data = array(
			'image'	=> $image,
			'site'		=> $site
		);
		$rules = array(
			'image'	=> 'required|image',
			'site'		=>'required'
		);
		$messages = array(
			'required' 	=> 1,
			'image.image' => 2,
		);
		
		$validation = Validator::make($data, $rules, $messages);
		if($validation->fails())
		{
			$number = $validation->messages()->all();
			if($number[0])
			{
				return Response::json(array('errCode'=>1, 'message'=>'信息填写不完整！'));
			}

			return Response::json(array('errCode'=>2, 'message'=>'必须为jpeg, png, bmp 或 gif的图片格式！'));
		}

		$link = new Link;

		$link->image = $image;
		$link->site 	= $site;
		if(!$link->save())
		{
			return Response::json(array('errCode'=>3, 'message'=>'添加失败！'));
		}

		return Response::json(array('errCode'=>0, 'message'=>'添加成功！'));

	}

	public function editLink()
	{
		$link_id = Input::get('link_id');
		$image = Input::get('image');
		$site	 = Input::get('site');

		$link = Link::find($link_id);
		if($image != null)
		{
			$data = array(
			'image'	=> $image,
			);
			$rule = array(
				'image'	=> 'image'
			);
			
			$validation = Validator::make($data, $rule);
			if($validation->fails())
			{
				return Response::json(array('errCode'=>1, 'message'=>'必须为jpeg, png, bmp 或 gif的图片格式！'));
			}

			$link->image = $image;
		}
		if($site != null)
		{
			$link->site 	= $site;
		}

		if(!$link->save())
		{
			return Response::json(array('errCode'=>2, 'message'=>'编辑失败！'));
		}

		return Response::json(array('errCode'=>0, 'message'=>'编辑成功！'));
	}

	public function deleteLink()
	{
		$link_id 	= Input::get('link_id');
		$link 		= Link::find($link_id);
		 
		if(!$link->delete())
		{
			return Response::json(array('errCode'=>'1', 'message'=>'删除失败！'));
		}

		return Response::json(array('errCode'=>0, 'message'=>'删除成功！'));
	}
	
}