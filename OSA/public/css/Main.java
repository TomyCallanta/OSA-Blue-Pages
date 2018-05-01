public class Main{
	public static void main(String args[]){
		int[] list1 = {1,2,2,3,5,9,11};
		int[] list2 = {2,3,3,3,6};

		int i = 0;
		int j = 0;
		int outCount = 0;
		int[] output = new int[list2.length + list2.length];
		while(outCount < output.length && i < list1.length && j < list2.length){
			System.out.println(outCount + "," + i + "," + j); 
			if(i > list1.length && j < list2.length){
				if(outCount == 0 || (outCount>0 && output[outCount-1] < list2[j])){
					output[outCount] = list2[j];
					outCount++;
				}
				j++;
			}else if(i < list1.length && j > list2.length){
				if(outCount == 0 || (outCount>0 && output[outCount-1] < list1[j])){
					output[outCount] = list2[j];
					outCount++;
				}
				i++;
			}else{
				if(list1[i] < list2[j]){
					if(outCount == 0 || (outCount>0 && output[outCount-1] < list1[j])){
						output[outCount] = list1[i];
						outCount++;
					}
					i++;
				}else if(list1[i] > list2[j]){
					if(outCount == 0 || (outCount>0 && output[outCount-1] < list2[j])){
						output[outCount] = list2[j];
						outCount++;
					}
					j++;
				}else{
					if(outCount == 0 || (outCount>0 && output[outCount-1] < list1[i])){
						output[outCount] = list2[j];
						outCount++;
					}
					i++;
					j++;
				}
			}

			outCount++;
		}

		for(int a= 0; a < outCount; a++){
			System.out.println(output[a]);
		}
	}
}