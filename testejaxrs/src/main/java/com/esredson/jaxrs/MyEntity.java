package com.esredson.jaxrs;

import javax.validation.constraints.NotNull;

public class MyEntity {
	
	@NotNull
    private String firstProperty;
	
	@NotNull
    private String secondProperty;
    
    private String thirdProperty;
    
    public MyEntity() {
		
	}

	public String getFirstProperty() {
		return firstProperty;
	}

	public void setFirstProperty(String firstProperty) {
		this.firstProperty = firstProperty;
	}

	public String getSecondProperty() {
		return secondProperty;
	}

	public void setSecondProperty(String secondProperty) {
		this.secondProperty = secondProperty;
	}

	public String getThirdProperty() {
		return thirdProperty;
	}

	public void setThirdProperty(String thirdProperty) {
		this.thirdProperty = thirdProperty;
	}
	
	
    
}
